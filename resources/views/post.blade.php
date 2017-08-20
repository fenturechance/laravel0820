@extends('layouts/app')

@section('script')

<script type="text/javascript">
	function getQueryParams(qs) { 
	    qs = qs.split('+').join(' '); //把送進來的字串，如果有加號就分開，然後用空白取代
	    	console.log(qs);//?page=1
	    var params = {}, //宣告一個空物件
	        tokens, //一個空變數
	        re = /[?&]?([^=]+)=([^&]*)/g; //一個正規表示法
	       // console.log(re.exec(qs)); //是一個陣列  ["?page=1","page","1"]
	        					//返回一个数组，其中存放匹配的结果。如果未找到匹配，则返回值为 null。
		while (tokens = re.exec(qs)) { 
		//如果這個網址符合正規表達法就進入迴圈
			// tokens = re.exec(qs);
			console.log(tokens);
	        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	        //可对 encodeURIComponent() 函数编码的 URI 进行解码
	        //此物件的page欄位的值是1
	    }
	    console.log(params);
	    return params;

	}
	console.log(document.location.search); //?page=1
	var query = getQueryParams(document.location.search);
	console.log(query); //{page: "1"}
	var page='';//這個變數是用來當作網址列後面的字串

	console.log(query.page); //這個page是query物件的屬性
	if(query.page != undefined){
		page = '?page='+ query.page;
	}
		$(function(){
			$.getJSON('/api/posts'+page,function(resp){
				// console.log(resp);
				for (var index in resp.data) {
					var obj= resp.data[index];
					// console.log(obj.title);
					$('#tbody').append('<tr><td>'+obj.id+'</td><td><a href="/posts/'+obj.id+'">'+obj.title+'</a></td></tr>');
				}
				console.log(resp.prev_page_url);
				if(resp.next_page_url==null){
					$('#btn-next').hide();
					$('#btn-pre').attr('href',resp.prev_page_url.replace('api/',''));
				}else if(resp.prev_page_url==null){
					$('#btn-pre').hide();
					$('#btn-next').attr('href',resp.next_page_url.replace('api/',''));
				}else{
					$('#btn-pre').attr('href',resp.prev_page_url.replace('api/',''));
					$('#btn-next').attr('href',resp.next_page_url.replace('api/',''));
				}
			});
		});

</script>

@endsection('script')

@section('content')
<!-- 自動map到yield -->

<h1>All My Post</h1>

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<table  class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
				</tr>
			</thead>
			<tbody id="tbody">
			</tbody>
		</table>
		<a class="btn btn-primary" id="btn-pre">Preious</a>
		<a class="btn btn-primary" id="btn-next">Next</a>
	</div>
</div>

@endsection