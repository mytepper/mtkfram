<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<div class="main">
		<h4>ใบส่งของ</h4>
		<table>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table class="boder">
			<thead>
				<tr>
					<th>รหัสสินค้า</th>
					<th>ชื่อสินค้า</th>
					<th>ขนาดบรรจุ</th>
					<th>ราคา</th>
					<th>จำนวน</th>
					<th>รวมราคา</th>
					<th>หมายเหตุ</th>
				</tr>
			</thead>
			<tbody>
				@if($data = BillList::get($rs->id))
				@foreach($data as $key => $value)
				<tr id="{{$value->id}}">
					<td>
						{{$value->Pcode}}{{$value->PID}}
					</td>
					<td>{{$value->Pname}}</td>
					<td>{{$value->Psize}} / {{$value->Punit}}</td>
					<td>{{$value->price}}</td>
					<td>{{$value->unit}}</td>
					<td>{{$value->price*$value->unit}}</td>
					<td>{{$value->note}}</td>
					
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		</div>
	</body>
</html>