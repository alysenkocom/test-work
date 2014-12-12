<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <link href="/bootstrap/css/bootstrap-form.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('form').form();
    });
    </script>
</head>

  <body style="margin-top:60px">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        
        {php}
            $config = require_once('protected/core/config.php');
            echo print_menu($config['menu']);
        {/php}                
        
        
                                
      </div><!-- /.container -->
    </nav>
    
    
    
    



