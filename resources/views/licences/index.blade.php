@extends('layouts.app')


@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                	<form method="post">
                    <div class="card">
                        <div class="header">
                            <h2>LICENSE</h2>
                        </div>
                        <div class="body">

                        	<div class="body table-responsive">

                        		<table class='table'>

                        			<tr>
                        				<td width="15%">Item ID</td>
                        				<td width="1%">:</td>
                        				<td><?php //echo $data['item_id']; ?></td>
                        			</tr>

                        			<tr>
                        				<td>Item Name</td>
                        				<td>:</td>
                        				<td><?php //echo $data['item_name']; ?></td>
                        			</tr>

                        			<tr>
                        				<td>Buyer</td>
                        				<td>:</td>
                        				<td><?php// echo $data['buyer']; ?></td>
                        			</tr>

                        			<tr>
                        				<td>Purchase Code</td>
                        				<td>:</td>
                        				<td><?php //echo $data['purchase_code']; ?></td>
                        			</tr>

                        			<tr>
                        				<td>License Type</td>
                        				<td>:</td>
                        				<td><?php //echo $data['license_type']; ?></td>
                        			</tr>

                        			<tr>
                        				<td>Purchase Date</td>
                        				<td>:</td>
                        				<td><?php //echo $data['purchase_date']; ?></td>
                        			</tr>

                        			<tr>
                        				<td></td>
                        				<td></td>
                        				<td><button type="submit" name="revoke_license" class="btn bg-blue waves-effect pull-right" onclick="return confirm('Are you sure want to revoke this license?')">REVOKE LICENSE</button></td>
                        			</tr>
                        			

                        		</table>

                        	</div>

                        </div>
                    </div>
                    </form>

                </div>
            </div>

@endsection