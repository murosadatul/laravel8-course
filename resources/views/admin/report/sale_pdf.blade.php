<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table border="1">
        <thead>
          <tr>
            <th width="20">No</th>
            <th>Order Date</th>
            <th>Region</th>
            <th>Item</th>
            <th>Sales Man</th>
            <th>Unit</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($rs_id as $no=>$item)
                <tr>
                    <td>{{ ($no +1) }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>{{ $item->region }}</td>
                    <td>{{ $item->item }}</td>
                    <td>{{ $item->sales_man }}</td>
                    <td>{{ numberToCurrency($item->unit) }}</td>
                </tr>
            @empty
            <tr>
                <td colspan="3"><i class="fa fa-folder-open"></i> Data tidak ada.</td>
            </tr>

            @endforelse
        </tbody>
      </table>
</body>
</html>
