<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <?= $this->Html->css('/bcss/blog-post.css') ?>
    <?= $this->Html->css('/bcss/bootstrap.css') ?>
	<?= $this->Html->css('/font-awesome/css/font-awesome.min.css') ?>
	

    <?= $this->fetch('meta') ?>
	<style>
	.container {
		padding-right: 15px;
		padding-left: 15px;
		margin-right: 0 !important;
		margin-left: 0 !important;
	}
	</style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:yellow;">LOGO</a>
            </div>
            
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container-fluid">
	
		<div class="row">
            <div class="col-lg-2">
			<ul class="nav nav-pills nav-stacked">
					
					<?php if($user_role=='super_admin'){ ?>
					<li style="color:red;  font-family:Lucida Sans Unicode;  font-size: 30px; text-transform: uppercase"><?php echo $user_role; ?></li>
					<li><?php echo $this->Html->link( 'All Company ', '/Companies/' ); ?></li>
					<li><?php echo $this->Html->link( 'Logout', '/Users/logout' ); ?></li>	
				<?php } else{ ?>
				
					<li style="color:red;  font-size: 30px;"><?php echo $name; ?></li>
					<li><?php echo $this->Html->link( 'Add Inventory', '/Inventories/add' ); ?></li>
					<li><?php echo $this->Html->link( 'Inventory List', '/inventories' ); ?></li>
					<li><?php echo $this->Html->link( 'Add Location', '/locations/add' ); ?></li>
					<li><?php echo $this->Html->link( 'All Location', '/locations/' ); ?></li>
					<li><?php echo $this->Html->link( 'Logout', '/Users/logout' ); ?></li>	
				<?php } ?>
			  
			  
			  
			  
			 
			  
			</ul>
            </div>
            <div class="col-lg-10">
			<?= $this->Flash->render() ?>
			<?php echo $this->fetch('content'); ?>
            </div>
        </div>
		

	

        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
	<?= $this->Html->script('/bjs/jquery.js') ?>
	<?= $this->Html->script('/js/jquery-3.1.1.min.js') ?>

    <!-- Bootstrap Core JavaScript -->
	<?= $this->Html->script('/bjs/bootstrap.min.js') ?>

</body>
</html>
