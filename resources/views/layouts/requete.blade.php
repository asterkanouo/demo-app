<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>jQuery Print Plugin</title>
    <!-- <script src="jquery-1.4.4.min.js" type="text/javascript"></script> -->
    <script src="/js/jquery.printPage.js" type="text/javascript"></script>

  <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script>
	</head>
	<body>
		<h3>This is a print button example</h3>
		<p>When you hit the button it will load your print template in an iframe and print it!</p>
		<p><a class="btnPrint" href='iframes/iframe.html'>Print!</a></p>
    <p><a class="btnPrint" href='iframes/iframe2.html'>Print second page!</a></p>
	</body>
</html>


<a class="btn btnPrint btn-success mx-2 mb-2" href="{{url('impContrat/'.$contrats->id) }}"><span class="fa fa-print"></span> Imprimer</a>