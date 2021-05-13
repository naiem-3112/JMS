<!DOCTYPE html>
<html>
<head>
<style>
#menuscripts {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#menuscripts td, #menuscripts th {
  border: 1px solid #ddd;
  padding: 8px;
}

#menuscripts tr:nth-child(even){background-color: #f2f2f2;}

#menuscripts tr:hover {background-color: #ddd;}

#menuscripts th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2C3E50;
  color: white;
}
</style>
</head>
<body>

<table id="menuscripts">
    <caption>Overall Menuscript</caption>
   
  <tr>
    <th>Published</th>
    <th>Pending</th>
    <th>Under Revision</th>
    <th>Total Menuscript</th>
  </tr>
  <tr>
    <td>{{ $publishedMenuscript->count() }}</td>
    <td>{{ $pendingMenuscript->count() }}</td>
    <td>{{ $revisionMenuscript->count() }}</td>
    <td>{{ $totalMenuscript->count() }}</td>
  </tr>
</table>

<br>

<table id="menuscripts">
    <caption>All Published Menuscripts</caption>
   
    <tr>
      <th>Title</th>
      <th>Name</th>
      <th>Email</th>
      <th>Paper</th>
    </tr>
    @foreach($publishedMenuscript as $menuscript)
    <tr>
        <td>{{$menuscript->title}}</td>
        <td>{{$menuscript->name}}</td>
        <td>{{$menuscript->email}}</td>
        <td><a target="_blank" href="{{ route('menuscript.download', $menuscript->paper) }}">{{ $menuscript->paper }}</a></td>
    </tr>
    @endforeach
  </table>
</body>
</html>
