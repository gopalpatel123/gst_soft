<?php 
require_once(ROOT . DS  .'vendor' . DS  . 'dompdf' . DS . 'autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Lato-Hairline');
$dompdf = new Dompdf($options);

$dompdf = new Dompdf();


//$description =  wordwrap($invoice->delivery_description,25,'<br/>');
//pr($description);exit;
$html = '
<html>
<head>
  <style>
  @page { margin: 160px 15px 10px 30px; }

  body{
    line-height: 20px;
	}
	
    #header { position:fixed; left: 0px; top: -160px; right: 0px; height: 160px;}
    
	#content{
    position: relative; 
	}
	
	@font-face {
		font-family: Lato;
		src: url("https://fonts.googleapis.com/css?family=Lato");
	}
	p.test {
		width: 11px; 
    word-wrap: break-word;
}
	p{
		margin:0;font-family: Lato;font-weight: 100;line-height: 12px !important;margin-top:-9px;
	}
	.odd td p{
		margin:0;font-family: Lato;font-weight: 100;line-height: 17px !important;margin-bottom: -1px;
	}
	.show td p{
			margin:0;font-family: Lato;font-weight: 100;line-height: 17px !important;
	}
	.topdata p{
		margin:0;font-family: Lato;font-weight: 100;line-height: 17px !important;margin-bottom: 1px;
	}
	.des p{
		margin:0;font-family: Lato;font-weight: 100;line-height: 17px !important;margin-bottom: 1px;width:291px;
	}
	table td{
		margin:0;font-family: Lato;font-weight: 100;padding:0;line-height: 1;
	}
	table.table_rows tr.odd{
		page-break-inside: avoid;
	}
	.table_rows, .table_rows th, .table_rows td {
	    border: 1px solid  #000; 
		border-collapse: collapse;
		padding:2px; 
	}
	.itemrow tbody td{
		border-bottom: none;border-top: none;
	}
	
	.table2 td{
		border: 0px solid  #000;font-size: 14px;padding:0px; 
	}
	.table_top td{
		font-size: 12px !important; 
	}
	.table-amnt td{
		border: 0px solid  #000;padding:0px; 
	}
	.table_rows th{
		border: 1px solid  #000;
		font-size:16px !important;
	}
	.table_rows td{
		border: 1px solid  #000;
		font-size:16px !important;
	}
	.avoid_break{
		page-break-inside: avoid;
	}
	.table-bordered{
		border: hidden;
	}
	table.table-bordered td {
		border: hidden;
	}
	
	</style>

<body>
  <div id="header" ><br/>	
		<table width="100%">
			<tr >
				<td style="text-align:center" colspan="16">
					<address>
							KT & Co.<br/>
							INDUSTRIAL AREA,PHASE <br/>
							sojat city, India, Pin - 306104.<br/>
							GSTIN: 08XXXXXXXXX
					</address>
				</td>
			</tr>
			<tr>
				<td width="30%" valign="top"> 
				<div align="right" style="font-size: 28px;font-weight: bold;color: #0685a8;">INVOICE</div>
				</td>
				<td align="right" width="35%" style="font-size: 12px; ">
				
				</td>
			</tr>
			
		</table>
  </div>
 

  
  <div id="content"> ';
  
  $html.='
  
<style>	
 

</style>

<table width="100%" class="table_rows itemrow" style="margin-top: -22px;">
	<thead>
		<table border="2" width="100%" class="table" style="margin-top:-22px;">
					<tbody>
					<tr>
						<td colspan="8">
							
						<p>Reverse Charge :No</p>
						<p>	Invoice No. :  AMKS/17-18/00001</p>
						<p>	Invoice Date:  01-July2017</p>
						<p>State:   RAJASTHAN       <span style="    margin-left: 40%; border: 1px solid; padding: 11px;    border-bottom: none;">State Code :  2 4</span></p>   
						</td>
						<td  colspan="8">
						<p>Transportation Mode  : </p>
						<p>	Vehicle Number :   </p>
						<p>	Date of Supply:  </p>
						<p>Place of Supply:   RAJASTHAN </p>
						</td>
						
						
					</tr>
	</thead>
</table>'; 
$html.='
<table width="100%" class="table_rows">
		<thead>
			<tr>
				<th rowspan="2" style="text-align: bottom;">Sr.No. </th>
				<th style="text-align: center;" rowspan="2" width="100%">Items</th>
				<th style="text-align: center;" rowspan="2"  >Quantity</th>
				<th style="text-align: center;" rowspan="2" >Rate</th>
				<th style="text-align: center;" rowspan="2" > Amount</th>
				<th style="text-align: center;" colspan="2" >Discount</th>
				<th style="text-align: center;" colspan="2" >P&F </th>
				<th style=" text-align: center;" rowspan="2" >Taxable Value</th>
				<th style="text-align: center;" colspan="2">CGST</th>
				<th style="text-align: center;" colspan="2" >SGST</th>
				<th style="text-align: center;" colspan="2" >IGST</th>
				<th style="text-align: center;" rowspan="2" >Total</th>
			</tr>
			<tr> <th style="text-align: center;" > %</th>
				<th style="text-align: center;">Amt</th>
				<th style="text-align: center;" > %</th>
				<th style="text-align: center;" >Amt</th>
				<th style="text-align: center;" > %</th>
				<th style="text-align: center;" >Amt</th>
				<th style="text-align: center;" > %</th>
				<th style="text-align: center;" >Amt</th>
				<th style="text-align: center;" > %</th>
				<th style="text-align: center;" >Amt</th>
				
			</tr>
		</thead>
		<tbody>
';
pr($invoiceBills); exit;
$sr=0; $h="-"; $total_taxable_value=0; foreach ($invoiceBills->sales_invoice_rows as  $invoiceRows): $sr++;
// pr($invoiceRows);
$html.='
	<tr class="odd">
		<td style="padding-top:8px;padding-bottom:5px;" valign="top" align="center" >'. h($sr) .'</td>
		<td style="padding-top:8px;padding-bottom:5px;line-height:20px " valign="top">
		<span> HSN Code : '.$invoiceRows->item->hsn_code;
		if($invoiceRows->customer_item_code){
			$html.=' <b><br/></b> Your  Item Code : '.$invoiceRows->customer_item_code; 
		}
		$html.='		
		<div style="height:'.$invoiceRows->height.'"></div></span>
		<span>'.$invoiceRows->description .'<div style="height:'.$invoiceRows->height.'"></div></span></td>
		<td style="padding-top:8px;padding-bottom:5px;" valign="top" align="center">'. h($invoiceRows->quantity) .'</td>
		<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->rate) .'</td>
		<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->amount) .'</td>';
		
		if($invoiceRows->discount_amount==0){ 
		$html.='
			<td style="padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format($invoiceRows->discount_percentage) .'%</td>
			<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->discount_amount) .'</td>';	
		}
		
		if($invoiceRows->pnf_amount==0){ 
		$html.='
			<td style="padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format($invoiceRows->pnf_percentage) .'%</td>
			<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->pnf_amount) .'</td>';	
		
		}
		
		$html.='
		<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->taxable_value) .'</td>';
		if($invoiceRows->cgst_amount==0){ 
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$cgst_per[$invoiceRows->id]['tax_figure']) .'%</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->cgst_amount) .'</td>';
		}
		if($invoiceRows->sgst_amount==0){ 
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$sgst_per[$invoiceRows->id]['tax_figure']) .'%</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->sgst_amount) .'</td>';
		}
		if($invoiceRows->igst_amount==0){ 
		$html.='
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$igst_per[$invoiceRows->id]['tax_figure']) .'%</td>
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->igst_amount) .'</td>';
		}
		$html.='

		<td style="padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Money->indianNumberFormat($invoiceRows->row_total) .'</td>
	</tr>';
	$total_taxable_value+=$invoiceRows->taxable_value;
endforeach; 
$fright_total=$invoice->fright_amount+$invoice->fright_cgst_amount+$invoice->fright_sgst_amount+$invoice->fright_igst_amount;
if($invoice->fright_amount != 0){ 
$html.='<tr>
			<td style="padding-top:8px;padding-bottom:5px;" valign="top" align="right" colspan="9" >Freight  Amount</td>
			<td style="padding-top:8px;padding-bottom:5px;" valign="top" align="right"  >'. $this->Money->indianNumberFormat($invoice->fright_amount,2) .'</td>';
		
		if($invoice->fright_cgst_amount==0){ 
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$fright_ledger_cgst->tax_figure) .'%</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" valign="top" align="right"  >'. $this->Number->format($invoice->fright_cgst_amount,[ 'places' => 2]) .'</td>';
		}
		
		if($invoice->fright_sgst_amount==0){ 
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$fright_ledger_sgst->tax_figure) .'%</td>
			<td style="'.$gst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" valign="top" align="right"  >'. $this->Number->format($invoice->fright_sgst_amount,[ 'places' => 2]) .'</td>';
		}
		
		if($invoice->fright_igst_amount==0){ 
		$html.='
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="center" valign="top">'. h($h) .'</td>';
		}else{
		$html.='
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" align="right" valign="top">'. $this->Number->format(@$fright_ledger_igst->tax_figure) .'%</td>
			<td style="'.$igst_hide.'"';$html.='padding-top:8px;padding-bottom:5px;" valign="top" align="right"  >'. $this->Money->indianNumberFormat($invoice->fright_igst_amount) .'</td>';
		}
		$html.='	
			
			<td style="padding-top:8px;padding-bottom:5px;" valign="top" align="right"  >'. $this->Money->indianNumberFormat($fright_total) .'</td>
		</tr>';
}
	$html.='</tbody>';
$html.='</table>';
	
$grand_total=explode('.',$invoice->grand_total);
$rupees=$grand_total[0];
$paisa_text='';
if(sizeof($grand_total)==2)
{
	$grand_total[1]=str_pad($grand_total[1], 2, '0', STR_PAD_RIGHT);
	$paisa=(int)$grand_total[1];
	$paisa_text= 'And'.' '.h(ucwords($this->NumberWords->convert_number_to_words($paisa))) .' Paisa';
}else{ $paisa_text=""; }

$basic_value=$invoice->fright_amount+$total_taxable_value;

$html.='
<table width="100%" class="table_rows" >
	<tbody>
			<tr>
				<td  width="75%">
					<b style="font-size:13px;"><u>Our Bank Details</u></b>
					<table width="100%" class="table2">
						<tr>
							<td width="" style="white-space: nowrap;">Bank Name</td>
							<td  style="white-space: nowrap;">: '.h($invoice->company->company_banks[0]->bank_name).'</td>
							<td  >Branch</td>
							<td style="white-space: nowrap;">: '.h($invoice->company->company_banks[0]->branch).'</td>
						</tr>
						
						<tr>
							<td  style="white-space: nowrap;">Account No</td>
							<td style="white-space: nowrap;">: '.h($invoice->company->company_banks[0]->account_no).'</td>
							<td >IFSC Code</td>
							<td  style="white-space: nowrap;">: '.h($invoice->company->company_banks[0]->ifsc_code).'</td>
						</tr>
						
					</table>
				</td>
				
				<td  width="25%">
					<table width="100%" class="table2">
					<tr>
							<td >Total</td>
							<td>:</td>
							<td style="text-align:right;" valign="">'. $this->Number->format($basic_value,[ 'places' => 2]) .'</td>
						</tr>';
					if($invoice->total_igst_amount == 0){
					$html.='
							<tr>
								<td  >Total CGST</td>
								<td>:</td>
								<td style="text-align:right;" valign="">'. $this->Money->indianNumberFormat($invoice->total_cgst_amount) .'</td>
								
							</tr>
							<tr>
								<td  >Total SGST</td>
								<td>:</td>
								<td style="text-align:right;" valign="">'. $this->Money->indianNumberFormat($invoice->total_sgst_amount) .'</td>
							</tr>';
					}else{
						$html.='
							<tr>
								<td  >Total IGST</td>
								<td>:</td>
								<td style="text-align:right;" valign="">'. $this->Money->indianNumberFormat($invoice->total_igst_amount) .'</td>
							</tr>';
						}
						$html.='
						<tr>
							<td >Grand Total</td>
							<td>:</td>
							<td style="text-align:right;" valign="">'. $this->Money->indianNumberFormat($invoice->grand_total) .'</td>
						</tr>
						</table>
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table_rows ">
		<tr>
			<td valign="top" width="18%">Amount in words</td>
			<td  valign="top"> '. h(ucwords($this->NumberWords->convert_number_to_words($rupees))) .'  Rupees ' .h($paisa_text).'</td>
		</tr>
		<tr>
			<td valign="top" width="18%">Additional Note</td>
			<td  valign="top" class="topdata">'. $this->Text->autoParagraph($invoice->additional_note).'</td>

		</tr>
		
		<tr>
				<td colspan="2" >
					<table width="100%" class="table2" >
						<tr>
							<td  >
								<table>
									<tr>
										<td style="line-height:20px" >Interest @15% per annum shall be charged if not paid  with in agreed terms. <br/> Invoice is Subject to Udaipur jurisdiction</td>
									</tr>
								</table>
								<table>
									<tr>
										<td >GST</td>
										<td >: '. h($invoice->company->gst_no) .'</td>
									</tr>
									<tr width="30">
										<td >PAN</td>
										<td >: '. h($invoice->company->pan_no) .'</td>
									</tr>
									<tr>
										<td >CIN</td>
										<td >: '. h($invoice->company->cin_no) .'</td>
									</tr>
								</table>
							</td>
							<td align="right" >
								<div align="center">
									<span>For <b>'. h($invoice->company->name) .'</b></span><br/>
									<img src='.ROOT . DS  . 'webroot' . DS  .'signatures/'.$invoice->creator->signature.' height="50px" style="height:50px;"/>
									<br/>
									<span><b>Authorised Signatory</b></span><br/>
									<span>'. h($invoice->creator->name) .'</span><br/>
									
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
	</table>
	
			';

 $html .= '
</body>
</html>';

	//echo $html; exit; 

$name='Invoice-'.h(($invoice->in1.'_IN'.str_pad($invoice->in2, 3, '0', STR_PAD_LEFT).'_'.$invoice->in3.'_'.$invoice->in4));

$dompdf->loadHtml($html);
$dompdf->set_paper('letter', 'landscape');
//$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output(); //echo $name; exit;
file_put_contents('Invoice_email/'.$name.'.pdf', $output);
$dompdf->stream($name,array('Attachment'=>0));
exit(0);
?>
