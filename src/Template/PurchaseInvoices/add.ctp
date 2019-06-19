

<?php //pr($salesInvoice); exit;
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Purchase Invoices');


?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			
			<div class="portlet-body">
				<?= $this->Form->create($purchaseInvoice,['onsubmit'=>'return checkValidation()']) ?>
					
					<div class="row">
						<div class="col-md-12 caption-subject font-green-sharp bold " align="center" style="font-size:16px"><b>PURCHASE INVOICE</b></div>
						
					</div><br><br>
					
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label><b>Purchase Invoice Voucher No :</b></label>&nbsp;&nbsp;<br>
								
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
								
								?>
								<?= $acronym.'/'.$financialyear.'/'. h(str_pad($Voucher_no_last, 5, '0', STR_PAD_LEFT))?>
								
								<?php $voucher_no_in=$acronym.'/'.$financialyear.'/'. h(str_pad($Voucher_no_last, 5, '0', STR_PAD_LEFT)); ?>
								<input type="hidden" name="invoice_no" class="state_id" value="<?php echo $voucher_no_in;?>">
								<input type="hidden" name="voucher_no" class="state_id" value="<?php echo $Voucher_no_last; ?>">
								
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Transaction Date <span class="required">*</span></label>
								
								<?php echo $this->Form->input('transaction_date', ['type' => 'text','label' => false,'class' => 'form-control input-sm date-picker','data-date-format' => 'dd-mm-yyyy','value' => date("d-m-Y"),'data-date-start-date'=>$coreVariable['fyValidFrom'],'data-date-end-date'=>$coreVariable['fyValidTo']]); ?>
								
							</div>
						</div>
						
						<div class="col-md-3">
								<label>Supplier</label>
								<?php
									 
									echo $this->Form->control('supplier_ledger_id',['class'=>'form-control input-sm supplier_ledger select2me','label'=>false, 'options' => $partyOptions,'required'=>'required']);
								?>
						</div>
						<div class="col-md-3">
								<label>Purchase Account</label>
								<?php echo $this->Form->control('purchase_ledger_id',['class'=>'form-control input-sm  select2me','label'=>false, 'options' => $Accountledgers,'required'=>'required']);
								?>
						</div>
					</div><br>
					
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Supplier Invoice No. </label>
								
								<?php echo $this->Form->input('supplier_invoice_no', ['label' => false,'class' => 'form-control input-sm','placeholder'=>'Supplier Invoice No','required']); ?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Narration </label>
								<?php echo $this->Form->control('narration',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'Narration','rows'=>'4']); ?>
							</div>
						</div>
					</div><BR/><BR/>
					
				   
				   <div class="row">
				  <div class="table-responsive">
								<table id="main_table" class="table table-condensed table-bordered" 
								style=" height: 24px; padding: 0px 0px;font-size: 12px;" width="100%">
								<thead>
								<tr align="center">
									<th rowspan="2" style="text-align:center;"><label>Item<label></td>
									<th rowspan="2" style="text-align:center;"><label>Qty<label></td>
									<th rowspan="2" style="text-align:center;"><label>Rate<label></td>
									<!--<th  colspan="2" style="text-align:center;"><label align="center">Discount (%)</label></th>
									<!--<th  colspan="2" style="text-align:center;"><label align="center">PNF (%)</label></th>-->
									<th rowspan="2" style="text-align:center;"><label>Taxable Value<label></td>
									<th colspan="2" style="text-align:center;"><label id="gstDisplay">GST<label></th>
									<th rowspan="2" style="text-align:center;"><label>Total<label></td>
									<th rowspan="2"><div align="center"></div></th>
								</tr>
								<tr>
									<!--<th><div align="center">%</div></th>
									<th><div align="center">Rs</div></th>
									<!--<th><div align="center">%</div></th>
									<th><div align="center">Rs</div></th>-->
									<th><div align="center">%</div></th>
									<th><div align="center">Rs</div></th>
									
								</tr>
								</thead>
								<tbody id='main_tbody' class="tab">
								 
								 </tbody>
								 <tfoot>
								<tr>
									<td  colspan="3" align="right">
										<?php echo "Total";?>	
									</td>
									<!--<td  colspan="2" align="right">
										<?php echo $this->Form->input('total_discount_amt', ['style'=>'text-align:right','readonly','label' => false,'class' => 'form-control input-sm total_discount_amt','type'=>'text','tabindex'=>'-1']);	 ?>
									</td>
									<td  colspan="2" align="right">
										<?php echo $this->Form->input('total_pnf_amt', ['style'=>'text-align:right','readonly','label' => false,'class' => 'form-control input-sm total_pnf_amt','type'=>'text','tabindex'=>'-1']);	 ?>
									</td>-->
									<td  colspan="1" align="right">
										<?php echo $this->Form->input('total_taxable_value', ['style'=>'text-align:right','readonly','label' => false,'class' => 'form-control input-sm total_taxable_value','type'=>'text','tabindex'=>'-1']);	 ?>
									</td>
									<td  colspan="2" align="right">
										<?php echo $this->Form->input('total_gst_value', ['style'=>'text-align:right','readonly','label' => false,'class' => 'form-control input-sm total_gst_value','type'=>'text','tabindex'=>'-1']);	 ?>
									</td>
									
									<td  colspan="1" align="right">
										<?php echo $this->Form->input('total_amount', ['style'=>'text-align:right','readonly','label' => false,'class' => 'form-control input-sm total_amount','type'=>'text','tabindex'=>'-1']);	 ?>
									</td>
									<td ><div align="center"></div></td>
									
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


<table id="sample_table" style="display:none;" width="100%">
	<tbody>
		<tr class="main_tr" class="tab">
			<td width="">
				<?php echo $this->Form->input('item_id', ['empty'=>'---Select---','options'=>@$itemOptions,'label' => false,'class' => 'form-control input-medium item_id','required'=>'required']); ?>
			</td>
			<td width="" >
				<?php echo $this->Form->input('quantity', ['label' => false,'class' => 'form-control input-sm numberOnly rightAligntextClass quantity','placeholder'=>'Qty','required']); ?>
			</td>
			<td width="">
				<?php echo $this->Form->input('purchase_rate', ['label' => false,'class' => 'form-control input-sm total numberOnly rightAligntextClass rate','required'=>'required','placeholder'=>'Purchase Rate','required']); ?>	
			</td>
			
			<td  width="10%" align="center">
				<?php echo $this->Form->input('q', ['style'=>'text-align:right','label' => false,'class' => 'form-control input-sm taxableValue','type'=>'text','tabindex'=>'-1']);
				?>	
			</td>
			<td  width="6%" align="center">
				<?php
				
					echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm gst_figure_id numberOnly','placeholder'=>'','type'=>'hidden']);
					
					echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm gst_percentage numberOnly','style'=>'text-align:right','placeholder'=>'','type'=>'text','tabindex'=>'-1']);
					
				?>	
			</td>
			<td  width="10%" align="center">
				<?php echo $this->Form->input('q', ['style'=>'text-align:right','label' => false,'class' => 'form-control input-sm gstValue','type'=>'text','tabindex'=>'-1']);
				?>	
			</td>
			
			<td  width="20%" align="center">
				<?php echo $this->Form->input('q', ['style'=>'text-align:center','readonly','label' => false,'class' => 'form-control input-sm netAmount','type'=>'text','tabindex'=>'-1']);
				?>	
			</td>
			<td align="center">
			
				<a class="btn btn-default add_row btn-xs" href="#" role="button" style="margin-bottom: 5px;"><i class="fa fa-plus"></i></a>
				<a class="btn btn-danger delete-tr btn-xs" href="#" role="button" style="margin-bottom: 5px;"><i class="fa fa-times"></i></a>
			</td>
		</tr>
	</tbody>
</table>

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
	
	<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	
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



<?php
	$js="
			var due_days=$('select[name=supplier_ledger_id] :selected').attr('default_days');
			$('.dueDays').val(due_days);
			var supplier_state_id=$('.supplier_state_id').val();
			var state_id=$('.state_id').val();
			if(supplier_state_id!=state_id)
			{
			if(supplier_state_id > 0)
			{
				$('#gstDisplay').html('IGST');
				$('#is_interstate').val('1');
			}
			else if(!supplier_state_id)
			{
				$('#gstDisplay').html('GST');
				$('#is_interstate').val('0');
			}
			else if(supplier_state_id==0)
			{
				$('#gstDisplay').html('GST');
				$('#is_interstate').val('0');
			}
			}
			else if(supplier_state_id==state_id){
				$('#gstDisplay').html('GST');
				$('#is_interstate').val('0');
			}
			//$(this).closest('tr').find('.output_igst_ledger_id').val(output_igst_ledger_id);
		
	$('.item_id').die().live('change',function(){ 
		var gst_figure_id=$('option:selected', this).attr('gst_figure_id');
		var gst_percentage=$('option:selected', this).attr('gst_figure_tax_name');
		$(this).closest('tr').find('.gst_figure_id').val(gst_figure_id);
		$(this).closest('tr').find('.gst_percentage').val(gst_percentage);
		forward_total_amount();
	});
	
	add_row();
	$('.add_row').die().live('click',function(){
			add_row();
	}) ;
	
	function add_row()
		{
			var tr=$('#sample_table tbody tr.main_tr').clone();
			$('#main_table tbody#main_tbody').append(tr);
			rename_rows();
			forward_total_amount();
		}
	$('.delete-tr').die().live('click',function() 
		{
			$(this).closest('tr').remove();
			rename_rows();
			forward_total_amount();
		});
	
	//rename_rows();
	function rename_rows()
	{ 
		var i=0;
		$('#main_table tbody#main_tbody tr.main_tr').each(function(){
			$(this).find('td:nth-child(1) select').select2().attr({name:'purchase_invoice_rows['+i+'][item_id]',id:'purchase_invoice_rows['+i+'][item_id]'});
			$(this).find('.quantity').attr({name:'purchase_invoice_rows['+i+'][quantity]',id:'purchase_invoice_rows['+i+'][quantity]'});
			$(this).find('.rate').attr({name:'purchase_invoice_rows['+i+'][rate]',id:'purchase_invoice_rows['+i+'][rate]'});
			$(this).find('.taxableValue').attr({name:'purchase_invoice_rows['+i+'][taxable_value]',id:'purchase_invoice_rows['+i+'][taxable_value]'}).attr('readonly', true);
			
			$(this).find('.gst_figure_id').attr({name:'purchase_invoice_rows['+i+'][item_gst_figure_id]',id:'purchase_invoice_rows['+i+'][item_gst_figure_id]'}).attr('readonly', true);
			
			$(this).find('.gst_percentage').attr({name:'purchase_invoice_rows['+i+'][gst_percentage]',id:'purchase_invoice_rows['+i+'][gst_percentage]'}).attr('readonly', true);
			
			$(this).find('.gstValue').attr({name:'purchase_invoice_rows['+i+'][gst_value]',id:'purchase_invoice_rows['+i+'][gst_value]'}).attr('readonly', true);
			$(this).find('.roundOff').attr({name:'purchase_invoice_rows['+i+'][round_off]',id:'purchase_invoice_rows['+i+'][round_off]'});
			$(this).find('.netAmount').attr({name:'purchase_invoice_rows['+i+'][net_amount]',id:'purchase_invoice_rows['+i+'][net_amount]'});

		i++;
		});
	}
	
	$('.rate').die().live('blur',function()
	{
		forward_total_amount();
	});
	$('.quantity').die().live('blur',function()
	{
		forward_total_amount();
	});
	
	
	
	forward_total_amount();

	function forward_total_amount() 
		{   	
			var total_dis=0;
			var total_pnf=0;
			var total_taxable=0;
			var total_gst=0;
			var total_round=0;
			var total_amt=0;
			
			$('#main_table tbody#main_tbody tr.main_tr').each(function()
			{ 
			    var quantity=parseFloat($(this).closest('tr').find('.quantity').val());
			    var rate=parseFloat($(this).closest('tr').find('.rate').val());
				var amountAfterDiscount=quantity*rate;
				 if(isNaN(amountAfterDiscount)){
					 amountAfterDiscount=0;
					 }
				taxableAmt=amountAfterDiscount;
				//taxableAmt=round(taxableAmt,2);
				$(this).closest('tr').find('.taxableValue').val(taxableAmt.toFixed(2));
				total_taxable=total_taxable+taxableAmt;
				var gstTax=parseFloat($(this).closest('tr').find('.gst_percentage').val());
					gstTax=gstTax/2;
					var gstAmt1=(taxableAmt*gstTax)/100;
					var gstAmt2=(taxableAmt*gstTax)/100;
					
					gstAmt1=round(gstAmt1,2);
					gstAmt2=round(gstAmt2,2);
					
					amt2=gstAmt1+gstAmt2;
					amt2=round(amt2,2);
					$(this).closest('tr').find('.gstValue').val(amt2);
					var gstamt11=parseFloat($(this).closest('tr').find('.gstValue').val());
					total_gst=total_gst+gstamt11;
					
					var totalAmount=taxableAmt+amt2;
					total_amt=total_amt+totalAmount; 
					$(this).closest('tr').find('.netAmount').val(parseFloat(totalAmount).toFixed(2));
			});
			$('.total_taxable_value').val(total_taxable.toFixed(2));
			$('.total_gst_value').val(total_gst.toFixed(2));
			$('.total_amount').val(parseFloat(total_amt).toFixed(2));
			
			//rename_rows();
		}
	
	function checkValidation() 
	{  
		var total_amount  = parseFloat($('.total_amount').val());
		if(!total_amount || total_amount==0){
			alert('Error: zero amount invoice can not be generated.');
			return false;
		}
		
		if(!total_amount || total_amount < 0){
			alert('Error: Minus amount invoice can not be generated.');
			return false;
		}
		
		if(confirm('Are you sure you want to submit!'))
		{
			$('.submit').attr('disabled','disabled');
			$('.submit').text('Submiting...');
			return true;
		}
		else
		{
			return false;
		}
		
	
	}
		
		


	
	";

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 

?>

