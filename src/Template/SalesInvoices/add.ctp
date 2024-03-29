<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 <meta http-equiv="refresh" content="5" >
 */
$this->set('title', 'Create Sales Invoice');
?>
<style>
.disabledbutton {
    pointer-events: none;
    opacity: 0.7;
}
.checkbox{
	margin:0px;
}
</style>

<!--<form method="GET" id="barcodeFrom">
	<div class="row">
		<div class="col-md-3">
			<?php echo $this->Form->input('itembarcode',['class'=>'form-control input-sm itembarcode','label'=>false, 'placeholder'=>'Item Code/Bar-Code','autofocus'=>'autofocus']);
			?>
		</div>
		<div class="col-md-1" align="left">
			<button type="submit" class="go btn blue-madison input-sm">Go</button>
		</div> 
	</div>
</form>-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Sales Invoice</span>
				</div>
			</div>
			<div class="portlet-body">
				
				<?= $this->Form->create($salesInvoice,['onsubmit'=>'return checkValidation()']) ?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Voucher No :</label>&nbsp;&nbsp;
								
								<?php
								//echo $coreVariable['company_name']; exit;
								   // $date = date('Y-m-d');
								    $date=date('Y-m-d',strtotime($FinancialYearData->fy_from));
									$d = date_parse_from_format('Y-m-d',$date);
									$yr=$d["year"];$year= substr($yr, -2);
									if($d["month"]=='01' || $d["month"]=='02' || $d["month"]=='03')
									{
									  $startYear=$year-1;
									  $endYear=$year;
									  $financialyear=$startYear.'-'.$endYear;
									}
									else
									{
									  $startYear=$year;
									  $endYear=$year+1;
									  $financialyear=$startYear.'-'.$endYear;
									}
								$words = explode(" ", $coreVariable['company_name']);
								$acronym = "NMPU";
								/* foreach ($words as $w) {
								$acronym .= $w[0];
								$acronym .= $w[1];
								$acronym .= $w[2];
								$acronym .= $w[3];
								} */
								?>
								<?= $acronym.'/'.$financialyear.'/'. h(str_pad($voucher_no, 5, '0', STR_PAD_LEFT))?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Transaction Date <span class="required">*</span></label>
								<?php echo $this->Form->control('transaction_date',['class'=>'form-control input-sm date-picker transaction_date disabledbutton','data-date-format'=>'dd-mm-yyyy','label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','data-date-start-date'=>@$coreVariable[fyValidFrom],'data-date-end-date'=>@$coreVariable[fyValidTo],'value'=>date('d-m-Y'),'readonly'=>'readonly']); ?>
							</div>
						</div>
						<input type="hidden" name="outOfStock" class="outOfStock" value="0">
						<input type="hidden" name="due_days" class="dueDays">
						<input type="hidden" name="company_id" class="customer_id" value="<?php echo $company_id;?>">
						<input type="hidden" name="location_id" class="location_id" value="<?php echo $location_id;?>">
						<input type="hidden" name="state_id" class="state_id" value="<?php echo $state_id;?>">
						<input type="hidden" name="is_interstate" id="is_interstate" value="0">
						<input type="hidden" name="isRoundofType" id="isRoundofType" class="isRoundofType" value="0">
						<input type="hidden" name="voucher_no" id="" value="<?= h($voucher_no, 4, '0') ?>">
						<div class="col-md-3">
								<label>Party</label>
								<?php echo $this->Form->control('party_ledger_id',['empty'=>'-Select Party-', 'class'=>'form-control input-sm party_ledger_id select2me','label'=>false,'options' => $partyOptions,'required'=>'required','value'=>$CashPartyLedgers->id]);
								?>
								
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sales Account</label>
								<?php echo $this->Form->control('sales_ledger_id',['class'=>'form-control input-sm sales_ledger_id select2me','label'=>false, 'options' => $Accountledgers,'required'=>'required']);
								?>
							</div>
						</div> 
					</div>
					<br>
					<!--<div class="row">
						<div class="col-md-3">
								<label>Customer Name</label>
								<?php echo $this->Form->control('customer_name',['empty'=>'-Select Party-', 'class'=>'form-control input-sm customer_name ','label'=>false,'required'=>'required']);
								?>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Customer Mobile</label>
								<?php echo $this->Form->control('customer_mobile',['empty'=>'-Select Party-', 'class'=>'form-control input-sm customer_mobile','label'=>false,'required'=>'required']);
								?>
							</div>
						</div> 
					</div>
					<br>-->
					<div class="row">
						<div class="col-md-3">
								<label>Payment Mode</label>
								<?php $option =[['value'=>'Cash','text'=>'Cash'],['value'=>'Cheque','text'=>'Cheque']];?>
								<?php echo $this->Form->control('payment_mode',['class'=>'form-control input-sm','label'=>false, 'options' => $option]); ?>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Vehicle Number</label>
								<?php echo $this->Form->control('vehicle_number',['class'=>'form-control input-sm ','label'=>false,'type'=>'text']);
								?>
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Transport Mode</label>
								<?php echo $this->Form->control('transport_mode',['class'=>'form-control input-sm ','label'=>false,'type'=>'text']);
								?>
							</div>
						</div> 
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Default Address</label>
								<?php echo $this->Form->textarea('default_address',['class'=>'form-control input-sm default_address','label'=>false]);
								?>
							</div>
						</div> 
					</div>
					<br>
					<div class="row">
					<div class="table-responsive">
								<table id="main_table" class="table table-condensed table-bordered" style="margin-bottom: 4px;" width="100%">
								<thead>
								<tr align="center">
									<td ><label>Item<label></td>
									<td width="40px"><label>Container No.<label></td>
									<td width="100px"><label> Package No.<label></td>
									<td width="150px"><label>Weight per Package  <label></td>
									<td><label>Qty<label></td>
									<td><label>Rate<label></td>
									
									<td><label>Taxable Value<label></td>
									<td width="100px"><label id="gstDisplay">GST %<label></td>
									<td width="100px"><label id="gstDisplay">GST RS<label></td>
									<td><label>Net Amount<label></td>
									<td></td>
								</tr>
								
								</thead>
								<tbody id='main_tbody' class="tab">
								</tbody>
								<tfoot>
									<tr>
										<td colspan="10">	
											<button type="button" class="add_row btn btn-default input-sm"><i class="fa fa-plus"></i> Add row</button>
										</td>
									</tr>
						<tr>
							<td colspan="8" align="right"><b>Amt Before Tax</b>
							</td>
							<td colspan="2">
							<?php echo $this->Form->input('amount_before_tax', ['label' => false,'class' => 'form-control input-sm amount_before_tax rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr>
							<td colspan="8" align="right"><b>Discount Amount</b>
							</td>
							<td colspan="2">
							<?php echo $this->Form->input('discount_amount', ['label' => false,'class' => 'form-control input-sm rightAligntextClass toalDiscount','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr id="add_cgst">
							<td colspan="8" align="right"><b>Total CGST</b>
							</td>
							<td colspan="2">
							<?php echo $this->Form->input('total_cgst', ['label' => false,'class' => 'form-control input-sm add_cgst rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr id="add_sgst">
							<td colspan="8" align="right"><b>Total SGST</b>
							</td>
							<td colspan="2">
								<?php echo $this->Form->input('total_sgst', ['label' => false,'class' => 'form-control input-sm add_sgst rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr id="add_igst" style="display:none">
							<td colspan="8" align="right"><b>Total IGST</b>
							</td>
							<td colspan="2">
								<?php echo $this->Form->input('total_igst', ['label' => false,'class' => 'form-control input-sm add_igst rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr>
							<td colspan="8" align="right"><b>Round Off</b>
							</td>
							<td colspan="2">
							<?php echo $this->Form->input('round_off', ['label' => false,'class' => 'form-control input-sm roundValue rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
						<tr>
							<td colspan="4" >
									<div class="radio-list" id="invoiceReceiptTd1" style="display:none">
									 <b>Check for Receipt</b>
										<div class="radio-inline" style="padding-left: 0px;">
											<?php echo $this->Form->radio(
											'invoice_receipt_type',
											[
												['value' => 'cash', 'text' => 'Cash','class' => ''],
												['value' => 'credit', 'text' => 'Credit','class' => '']
											],['value'=>'credit']
											); ?>
										</div>
                                    </div>
									<input type="hidden" id="invoiceReceiptTd2" name="invoiceReceiptTd">
									<input type="hidden" id="receipt_amount" name="receipt_amount">
							</td>
							
							<td colspan="4" align="right"><b>Amt After Tax</b>
							</td>
							
							<td colspan="2">
							<?php echo $this->Form->input('amount_after_tax', ['label' => false,'class' => 'form-control input-sm amount_after_tax rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'', 'tabindex'=>'-1']); ?>	
							</td>
						</tr>
					</tfoot>
					</table>
				   </div>
				  </div>
			</div>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
				<?= $this->Form->end() ?>
		</div>
	</div>
</div>
<!-- BEGIN PAGE LEVEL STYLES -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->
	
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->

<table id="sample_table" style="display:none;" width="100%">
	<tbody>
		<tr class="main_tr" class="tab">
			<td>
				<input type="hidden" name="" class="outStock" value="0">
				<input type="hidden" name="" class="totStock " value="0">
				<input type="hidden" name="gst_figure_id" class="gst_figure_id" value="">
				<input type="hidden" name="gst_amount" class="gst_amount" value="">
				<input type="hidden" name="gst_figure_tax_percentage" class="gst_figure_tax_percentage calculation" value="">
				<input type="hidden" name="tot" class="totamount calculation" value="">
				<input type="hidden" name="gst_value" class="gstValue calculation" value="">
				<input type="hidden" name="exactgst_value" class="exactgst_value calculation" value="">
				<input type="hidden" name="discountvalue" class="discountvalue calculation" value="">
				<?php echo $this->Form->input('item_id', ['empty'=>'-Item Name-', 'options'=>$itemOptions,'label' => false,'class' =>'form-control input-medium input-sm 	attrGet bottomSelect','required'=>'required']); ?>
				<span class="itemQty" style="font-size:10px;"></span>
			</td>
			
			<td>
				<?php echo $this->Form->input('marks', ['label' => false,'class' => 'form-control input-sm marks discalculation  rightAligntextClass','placeholder'=>'marks','value'=>0]); ?>	
			</td>
			<td>
				<?php echo $this->Form->input('kind_of_pak', ['label' => false,'class' => 'form-control input-sm kind_of_pak discalculation  rightAligntextClass','placeholder'=>' Package. NO.','value'=>0]); ?>	
			</td>
			<td>
			
				<?php echo $this->Form->input('weight_per_enum', ['label' => false,'class' => 'form-control input-sm weight_per_enum dis_amount  rightAligntextClass','empty'=>'- Select weight per Pak.-','style'=>'width: 65px;margin: 2px;float: left;']); ?>	
				
				<?php echo $this->Form->input('unit_id', ['label' => false,'class' => 'form-control input-sm unit_id dis_amount  rightAligntextClass','empty'=>'- Select Units -','options'=>$Units,'style'=>'width: 69px;margin: 2px;']); ?>	
			
				
			</td>			
			<td>
				<?php echo $this->Form->input('quantity', ['label' => false,'class' => 'form-control input-sm calculation quantity numberOnly rightAligntextClass','id'=>'check','required'=>'required','placeholder'=>'Quantity', 'value'=>1]); ?>
			</td>
			<td>
				<?php echo $this->Form->input('rate', ['label' => false,'class' => 'form-control input-sm calculation rate rightAligntextClass','required'=>'required','placeholder'=>'Rate', 'readonly'=>'readonly', 'tabindex'=>'-1']); ?>
			</td>
			
			
			<td>
				<?php echo $this->Form->input('taxable_value', ['label' => false,'class' => 'form-control input-sm taxable_value rightAligntextClass','required'=>'required','placeholder'=>'Amount', 'readonly'=>'readonly', 'tabindex'=>'-1']); ?>
			</td>
			<td>
				<?php echo $this->Form->input('gst_figure_id', ['label' => false,'class' => 'form-control input-sm gst_figure_id ', 'options'=> $gstFigures,'required'=>'required', 'tabindex'=>'-1']); ?>	
			</td>
			
			<td>
				<?php echo $this->Form->input('gst_figure_rs', ['label' => false,'class' => 'form-control input-sm gst_figure_rs ','required'=>'required', 'tabindex'=>'-1']); ?>	
			</td>
			<td>
				<?php echo $this->Form->input('net_amount', ['label' => false,'class' => 'form-control input-sm net_amount calculation rightAligntextClass','required'=>'required', 'readonly'=>'readonly','placeholder'=>'Taxable Value', 'tabindex'=>'-1']); ?>					
			</td>
			<td align="center">
				<a class="btn btn-danger delete-tr btn-xs dlt" href="#" role="button" style="margin-bottom: 5px;"><i class="fa fa-times"></i></a>
				<?php echo $this->Form->input('is_gst_excluded1', ['label' => false,'class' => 'form-control input-sm is_gst_excluded tooltips', 'type'=>'checkbox', 'data-placement'=>'top', 'data-original-title'=>'Excluded GST?']); ?>
				<?php echo $this->Form->input('is_gst_excluded', ['label' => false,'class' => 'form-control input-sm is_gstvalue_excluded', 'type'=>'hidden']); ?>
				
			</td>
		</tr>
	</tbody>
</table>

<?php
	$js="
	$(document).ready(function() {
		
		$('.attrGet').die().live('change',function(){
			var itemQ=$(this).closest('tr');
			var gst_figure=$('option:selected', this).attr('first_gst_figure_id');
			var sales_rate=$('option:selected', this).attr('sales_rate');
			  $(this).closest('tr').find('.rate').val(sales_rate);
			$(this).closest('tr').find('.gst_figure_id').val(gst_figure);
			forward_total_amount();
		});
		
		$('.delete-tr').die().live('click',function() 
		{
			$(this).closest('tr').remove();
			rename_rows();
			forward_total_amount();
		});
		ComponentsPickers.init();
		
	});
	
	function changethevalue(id)
	{
		alert(id);
	}
	
	$('.add_row').click(function(){
		add_row();
    }) ;
	
	$( document ).ready(add_row);
	function add_row()
	{
		var tr=$('#sample_table tbody tr.main_tr').clone();
		$('#main_table tbody#main_tbody').append(tr);
		var test = $('input[type=radio]:not(.toggle),input[type=checkbox]:not(.toggle)');
		if (test) { test.uniform(); }
		$('.tooltips').tooltip();
		rename_rows();
		forward_total_amount();
	}
	function rename_rows()
	{
		var i=0;
		$('#main_table tbody#main_tbody tr.main_tr').each(function(){
			
			$(this).find('td:nth-child(1) select.attrGet').select2().attr({name:'sales_invoice_rows['+i+'][item_id]',id:'sales_invoice_rows['+i+'][item_id]'});
			
			$(this).find('.quantity').attr({name:'sales_invoice_rows['+i+'][quantity]',id:'sales_invoice_rows['+i+'][quantity]'});
			$(this).find('.rate').attr({name:'sales_invoice_rows['+i+'][rate]',id:'sales_invoice_rows['+i+'][rate]'});
			$(this).find('.marks').attr({name:'sales_invoice_rows['+i+'][marks]',id:'sales_invoice_rows['+i+'][marks]'});

			$(this).find('.kind_of_pak').attr({name:'sales_invoice_rows['+i+'][kind_of_pak]',id:'sales_invoice_rows['+i+'][kind_of_pak]'});
			$(this).find('.weight_per_enum').attr({name:'sales_invoice_rows['+i+'][weight_per_enum]',id:'sales_invoice_rows['+i+'][weight_per_enum]'});
			$(this).find('.unit_id').attr({name:'sales_invoice_rows['+i+'][unit_id]',id:'sales_invoice_rows['+i+'][unit_id]'});
			$(this).find('.gstAmount').attr({name:'sales_invoice_rows['+i+'][taxable_value]',id:'sales_invoice_rows['+i+'][taxable_value]'});

			$(this).find('.gst_figure_id').attr({name:'sales_invoice_rows['+i+'][gst_figure_id]',id:'sales_invoice_rows['+i+'][gst_figure_id]'});
$(this).find('.gst_figure_rs').attr({name:'sales_invoice_rows['+i+'][gst_figure_rs]',id:'sales_invoice_rows['+i+'][gst_figure_rs]'});

			$(this).find('.discountAmount').attr({name:'sales_invoice_rows['+i+'][net_amount]',id:'sales_invoice_rows['+i+'][net_amount]'});
			$(this).find('.is_gstvalue_excluded').attr({name:'sales_invoice_rows['+i+'][is_gst_excluded]',id:'sales_invoice_rows['+i+'][is_gst_excluded]'});
			$(this).find('.gstValue').attr({name:'sales_invoice_rows['+i+'][gst_value]',id:'sales_invoice_rows['+i+'][gst_value]'});
			
			// if(i==0)
			// {
			 // $(this).closest('tr').find('.dlt').remove();
			// }
			i++;
		});
	}
	
	$('.calculation').die().live('keyup',function()
	{
		forward_total_amount();
	});

	function forward_total_amount(){
		var isExcludingCalculation;
		var total  = 0;
		var gst_amount  = 0;
		var gst_value  = 0;
		var s_cgst_value=0;
		var roundOff1=0;
		var round_of=0;
		var isRoundofType=0;
		var igst_value=0;
		var outOfStockValue=0;
		var s_igst=0;
		var newsgst=0;
		var newigst=0;
		var exactgstvalue=0;
		var totDiscounts=0;
		var convertDiscount=0;
		$('#main_table tbody#main_tbody tr.main_tr').each(function(){
			var quantity  = $(this).find('.quantity').val();
			if(!quantity){quantity=0;}
			var quantity=round(quantity,2);
			
			var rate  = parseFloat($(this).find('.rate').val());
			if(!rate){rate=0;}
			var rate=round(rate,2);
			
			var amount=quantity*rate;
			if(!amount){amount=0;}
			var amount=round(amount,2);
			$(this).find('.taxable_value').val(amount);
			$(this).find('.net_amount').val(amount);
			
			var taxable_values=$(this).find('.taxable_value').val();
			
			var gst_figure_ids=$(this).find('.gst_figure_id option:selected').attr('tax_percentage');
			
			var gst_figure_rat= taxable_values*gst_figure_ids/100;
			
			$(this).find('.gst_figure_rs').val(gst_figure_rat);
			
	        var netamount = $(this).find('.net_amount ').val();
			var fullnetamount	= (parseFloat(netamount) + parseFloat(gst_figure_rat));
			$(this).find('.net_amount').val(fullnetamount);
		
		
		});
		$('select.gst_figure_id').change(function(){
        var gst_figure_ids_change = $(this).children('option:selected').attr('tax_percentage');
     
	 alert(gst_figure_ids_change);
    });
    
		/* $('.amount_after_tax').val(roundOff1.toFixed(2));
		$('.amount_before_tax').val(gst_amount.toFixed(2));
		$('.add_cgst').val(newsgst);
		$('.add_sgst').val(newsgst);
		$('.add_igst').val(newigst);					
		$('.roundValue').val(round_of.toFixed(2));
		$('.isRoundofType').val(isRoundofType);
		$('.outOfStock').val(outOfStockValue);
		$('.toalDiscount').val(totDiscounts); */
		rename_rows();
	}

	
	
	
	function checkValidation() 
	{  
		var amount_before_tax  = parseFloat($('.amount_before_tax').val());
		if(!amount_before_tax || amount_before_tax==0){
			alert('Error: Zero amount invoice can not be generated.');
			return false;
		}
		
		if(!amount_before_tax || amount_before_tax < 0){
			alert('Error: Minus amount invoice can not be generated.');
			return false;
		}
		
		
		
		
		
	}";
	
	$js.="
	$(document).ready(function() {
	$('.quantity,.discount,.dis_amount').keypress(function(event) {
			if ( event.which == 45 || event.which == 189 ) {
			event.preventDefault();
		}
		}); });";
echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>
