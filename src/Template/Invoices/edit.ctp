<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://www.jsviews.com/download/jsrender.min.js"></script>
<link href="https://www.jsviews.com/samples/samples.css" rel="stylesheet" />
<?= $this->Html->script('jquery.mask.min.js'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="invoices form large-9 medium-8 columns content" ng-app="invoice_app" ng-controller="invoice_controller">
    <?php // debug(json_encode($invoice->invoice_items)) ?>
    <?php  // debug($json) ?>
    <?= $this->Form->create($invoice, ['id' => 'form']) ?>
    <fieldset>
        <legend><?= __('Nota Baru') ?></legend>
        <?php
        echo $this->Form->control('invoice_code', array('class'=>'customInputArea',  'style'=>'width:400px', 'label' => 'Kode Nota'));
        echo $this->Form->control('customer_id', ['options' => $customers, 'class'=>'customInputArea', 'label' => 'Customer']);
        // echo $this->Form->control('invoice_date', array('class'=>'customInputArea'));
        ?>

        <div class="input date required customInputArea">
            <label>Tanggal Nota</label>
            <input type="date" name="invoice_date" required="required" value=<?= $invoice->invoice_date->i18nFormat('yyyy-MM-dd'); ?>   >
        </div>

    </fieldset>

    <button type="button" class="btn btn-secondary" id="btnAdd" ng-click="addRow()"> Tambah Barang </button>

    <table style="width: 100%" id="invTbl">
        <colgroup>
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 15%;">
        </colgroup>



        <!-- Put <thead>, <tbody>, and <tr>'s here! -->
        <tbody>
        <tr>
            <th> No </th>
            <th> Kode Barang </th>
            <th> Nama Barang </th>
            <th> Banyaknya </th>
            <th> Satuan </th>
            <th> Harga Satuan </th>
            <th> Total Harga </th>
        </tr>
        <tr ng-repeat="InvoicedItem in InvoicedItems">
            <td> {{$index + 1}} </td>
            <td> <select ng-model="InvoicedItem.item_details" ng-options="x.item_code for x in Items track by x.id" name="{{'Item_code_' + ($index+1)}}" id="{{'item_select'+($index+1)}}" ng-click="add_dynamic_listener($index+1)" > </select></td>
            <td> {{InvoicedItem.item_details.item_name}} </td>
            <td> <input type="number" name="quantity" step="0.5" required="required" ng-model="InvoicedItem.quantity"> </td>
            <td> {{InvoicedItem.item_details.unit}} </td>
            <td>
                Rp <input id="{{'uang'+($index+1)}}" type="text" value={{InvoicedItem.unit_price}} ng-keyup="update_price(InvoicedItem, $index+1)">
                <input class="hiddenField" id="{{'hidden_val'+($index+1)}}" type="number" required="required" value={{InvoicedItem.item_details.standard_sell_price_per_unit}}>
                <!-- <input  id="hidden_val" type="number" value={{InvoicedItem.item_details.standard_sell_price_per_unit}} ng-model="InvoicedItem.unit_price"> -->
            </td>
            <td> {{subtotalPrice(InvoicedItem.quantity, InvoicedItem.unit_price, InvoicedItem.item_details.standard_sell_price_per_unit) | currency}} </td>
            {{add_dynamic_listener($index+1)}}
        </tr>
        <tr>
            <td colspan="7" align="right"> {{totalPrice() | currency}} </td>
        </tr>
        </tbody>
    </table>

    <!--    The total is {{totalPrice() | currency}}-->
    <!--    {{InvoicedItems}}-->


    <?= $this->Form->button(__('Submit'), ['ng-click' => 'addJSON()']) ?>
    <?= $this->Form->end() ?>
</div>


<script>
    // Import vars for previously stored items
    var json = <?= $json ?>;
    console.log(json.invoice_items);
</script>


<script>

    // setup angular apps
    var app = angular.module("invoice_app", []);
    app.controller('invoice_controller', function($scope, $http) {
        // call API to get item lists
        $http.get("/firna/items/findallItems.json").then(function(response) {
            $scope.Items = response.data;
      //      console.log($scope.Items);
        });


        //console.log(lala);
        $scope.InvoicedItems = json.invoice_items;

        $scope.InvoicedItems.forEach(function(item){
            item.item_details = item.item;
        });

        // console.log(json.invoice_items);

        //dynamic row adding and subtotal calculation
        $scope.addRow = function() {
            $scope.InvoicedItems.push({});
            //$scope.add_dynamic_listener($scope.InvoicedItems.length);
        };
        $scope.subtotalPrice = function(quantity, price, standard_price) {

            // quantity and price exists
            var total = quantity*price;
            if (!isNaN(total)) {return total};

            // price is standard
            total = quantity*standard_price;
            if (!isNaN(total)) {return total};

            // item is undefined
            return 0;
        };
        $scope.totalPrice = function() {
            let total = 0;
            for (let item of $scope.InvoicedItems){
                if (item.hasOwnProperty("quantity")) {
                    subtotal = $scope.subtotalPrice(item.quantity, item.unit_price, item.item_details.standard_sell_price_per_unit);
                    if (!isNaN(subtotal)) {
                        total += subtotal;
                    }
                }
            }
            return total;
        };

        // Add JSON to end of form before submit
        $scope.addJSON = function() {
            $("<input />").attr("type", "hidden")
                .attr("name", "JSONlist")
                .attr("value", JSON.stringify($scope.InvoicedItems))
                .appendTo("#form");
            $("<input />").attr("type", "hidden")
                .attr("name", "amount")
                .attr("value", $scope.totalPrice())
                .appendTo("#form");
            return true;
        };

        $scope.update_price = function(item, index) {
            item.unit_price = $('#uang'+index).cleanVal();
        };

        // need to be added later on, otherwise listener may be added before DOM is ready
        $scope.add_dynamic_listener = function(index) {
            // Format mata uang.
            $('#uang'+index).mask('000.000.000', {reverse: true});

            $('#item_select'+index).on('change', function(){
                $('#uang'+index).val($('#uang'+index).masked($('#hidden_val'+index).val()));
            });
        };
    });

</script>


<script type="text/javascript">
    add_listener = function(index) {
        // Format mata uang.
        $('#uang'+index).mask('000.000.000', {reverse: true});

        $('#item_select'+index).on('change', function(){
            $('#uang'+index).val($('#uang'+index).masked($('#hidden_val'+index).val()));
        });
    };

    $(document).ready(function(){
        // expand listener from index 1 to number of rows -2 (i.e. number of original invoiced items)
        var i;
        for (i = 1; i <= $('#invTbl tr').length - 2 ; i++) {
            add_listener(i);
        }
    });



</script>
