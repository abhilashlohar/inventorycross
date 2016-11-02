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
    <div class="container">
        <div class="row">
			<div class="col-lg-2"></div>
            <!-- Blog Post Content Column -->
            <div class="col-lg-10">
			<?= $this->Flash->render() ?>
			<?php echo $this->fetch('content'); ?>
            </div>
			<div class="col-lg-3"></div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
	<?= $this->Html->script('/bjs/jquery.js') ?>


    <!-- Bootstrap Core JavaScript -->
	<?= $this->Html->script('/bjs/bootstrap.min.js') ?>
	
	
</body>
</html>
