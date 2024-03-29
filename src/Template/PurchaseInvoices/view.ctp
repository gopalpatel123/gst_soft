<style>

@media print{
	.maindiv{
		width:100% !important;
		margin:auto;
	}	
	.hidden-print{
		display:none;
	}
}

</style>
<style type="text/css" media="print">
@page {
	width:100%;
    size: auto;   /* auto is the initial value */
    margin: 0px 0px 0px 0px;  /* this affects the margin in the printer settings */
}
.maindiv {
border:solid 1px #c7c7c7;background-color: #FFF;padding: 10px;margin: auto;width: 100%;font-size: 12px;
}
</style>


<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Purchase Invoice View');
?>
<div  class="maindiv" style="border:solid 1px #c7c7c7;background-color: #FFF;padding: 10px;margin: auto;width:100%;font-size: 12px;">	
	<table width="100%" class="divHeader">
		<tbody><tr>
				<td width="30%"><?php if(!empty(@$purchaseInvoice->company->logo)){ ?>
				<?php echo $this->Html->image('/img/'.$purchaseInvoice->company->logo, ['height' => '70px', 'width' => '70px']); ?>
				<?php } ?></td>
				<td align="center" width="40%" style="font-size: 12px;"><div align="center" style="font-size: 18px;font-weight: bold;color: #0685a8;">PURCHASE INVOICE VIEW</div></td>
				<td align="right" width="40%" style="font-size: 12px;">
				<span style="font-size: 14px;font-weight: bold;"><?=@$purchaseInvoice->company->name?></span><br/>
				<span><?=@$purchaseInvoice->company->address?>, <?=@$purchaseInvoice->company->state->name?></span></br>
				<span> <i class="fa fa-phone" aria-hidden="true"></i>  <?=@$purchaseInvoice->company->phone_no ?> |  Mobile : <?=@$purchaseInvoice->company->mobile ?><br> GSTIN NO:
				<?=@$purchaseInvoice->company->gstin ?></span></td>
			</tr>
			<tr>
				<td colspan="3">
				<div style="border:solid 2px #0685a8;margin-bottom:5px;margin-top: 5px;"></div>
				</td>
			</tr>
		</tbody>
	</table>
		<table width="100%">
		<tbody>
			<tr>
				<td width="50%" valign="top" align="left">
				<table>
					 <tbody>
						<td>Invoice  No</td>
						<td width="20" align="center">:</td>
						<td><?php echo ($purchaseInvoice->invoice_no);?>
					</tr>
					
				</tbody></table>
				</td>
				<td width="50%" valign="top" align="right">
					<table>
						<tbody><tr>
							<td>Transaction Date</td>
							<td width="20" align="center">:</td>
							<td><?php echo date("d-m-Y",strtotime($purchaseInvoice->transaction_date)); ?></td>
						</tr>
						<tr>
							<td>Supplier</td>
							<td width="20" align="center">:</td>
							<td><?php echo $purchaseInvoice->supplier_ledger->name; ?></td>
						</tr>
						
					</tbody></table>
				</td>
			</tr>
			
		</tbody></table>
		Narration: <?php echo $purchaseInvoice->narration;?>
		<br/><br/>
		<table width="100%" class="table  table-bordered" style="border:none;" border="0">
			<thead>
				<tr></tr>
				<tr align="center" >
					<td rowspan="2"><b>Sr</b></td>
					<td rowspan="2"><b>Item</b></td>
					<td rowspan="2"><b>Qty</b></td>
					<td rowspan="2"><b>Rate</b></td>
					
					
					<td rowspan="2"><b>Taxable Value</b></td>
					<td colspan="2"><b><?php if($supplier_state_id == $state_id){ echo 'GST'; } else{ echo 'IGST';} ?></b></td>
					<td rowspan="2"><b>Net Amount</b></td>
				</tr>
				<tr>
					
					
					<th><div align="center">%</div></th>
					<th><div align="center">Rs</div></th>
					
				</tr>
			</thead>
			<tbody id='main_tbody' class="tab">
			<?php $i=0;	 $total=0;		$total_discount=0;		$total_pnf=0;	
				$total_taxable_value=0; $total_gst=0;	$total_net_amount=0;
				foreach($purchaseInvoice->purchase_invoice_rows as $purchaseInvoiceRows)
				{ 
					
					//$total_discount+=$discount_amt;
				?>
					
				<tr class="main_tr" class="tab">
					<td width="2%" class="rightAligntextClass"><?php echo $i+1; ?></td>
					<td width="20%">
						<?php echo $purchaseInvoiceRows->item->name; ?>
					</td>
					<td width="5%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->quantity; ?>
					</td>
					<td width="10%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->rate; ?>
					</td>
					
				
					<td width="10%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->taxable_value; 
						$total_taxable_value+=$purchaseInvoiceRows->taxable_value;
						?>
					</td>
					<td width="5%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->gst_percentage; ?>
					</td>
					<td width="5%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->gst_value; 
						$total_gst+= $purchaseInvoiceRows->gst_value; 
						?>
					
					</td>
					<td width="10%" class="rightAligntextClass">
						<?php echo $purchaseInvoiceRows->net_amount; 
						$total_net_amount+= $purchaseInvoiceRows->net_amount;
						?>
					</td>
					
				</tr>
			<?php $i++; } ?>
				<tr>
				<td colspan="4" class="rightAligntextClass"><b>Total</b></td>
				
				<td  class="rightAligntextClass"><b><?php  echo $total_taxable_value; ?></b></td>
				<td colspan="2" class="rightAligntextClass"><b><?php if($total_gst>0) { echo $total_gst; } ?></b></td>
				<td  class="rightAligntextClass"><b><?php echo $total_net_amount; ?></b></td>
				</tr>
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
						
 </div>


