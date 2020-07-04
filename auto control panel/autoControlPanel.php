<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style2.css" />
    <title>Auto Panel</title>
</head>
<body>
    
    <form method="post" action="butt2.php" class="form1  ">
        <div class="form-group  form-inline">
            <label><p>Right</p></label>
            <input type="number" id="right" class="form-control mx-sm-5" name="right" min="1"><br /> </div>
        <div class="form-group  form-inline">
            <label><p>Forward</p></label>
            <input type="number" id="forward" class="form-control mx-sm-5" name="forward" min="1"><br /></div>
        <div class="form-group  form-inline">
            <label><p>Left</p></label>
            <input type="number" id="left" class="form-control mx-sm-5" name="left" min="1"><br /></div>
        <input type="submit" name="delete" value="delete" class="button1">
        <input type="submit" value="save" class="button1" >
        <input type="button" id="start" onclick="disap()" value="start" class=" button1">

    </form><ul type="none" style="display:inline-flex;">
   <li> <canvas id="canvas1" width="500" height="300" style="border: 1px solid black;"></canvas></li>

           <li> <table class="table" id='tab'>

                <tbody>
                    <tr>
                        <th class="thead-dark">right</th>
                        <th> <?php echo $_SESSION["right2"]  ?></th>
                    </tr>
                    <tr>
                        <th class="thead-dark">forward</th>
                        <th> <?php echo  $_SESSION["forward2"];?> </th>
                    </tr>
                    <tr>
                        <th class="thead-dark">left</th>
                        <th><?php echo  $_SESSION["left2"];?></th>
                    </tr>
                </tbody>
            </table></li>

    <br />
</ul>

    <script>
        function disap (){
        document.getElementById("tab").style.display = "block"; }

        ctx = document.getElementById("canvas1").getContext("2d");
        var button = document.getElementById('start');
               
        button.addEventListener('click', function () {
             ctx.beginPath();
            var rx = 100 + <?php echo $_SESSION["right2"]  ?> ;
            var fy = 250 - <?php echo  $_SESSION["forward2"];?> ;
            var lx = rx - <?php echo  $_SESSION["left2"];?>  ;
            canvas_arrow(ctx, 100 , 250 , rx , 250);
            canvas_arrow(ctx, rx , 250 , rx , fy );
            canvas_arrow(ctx, rx, fy , lx , fy);
            ctx.stroke();

        }, false);

        function canvas_arrow(context, fromx, fromy, tox, toy) {
            var headlen = 10; // length of head in pixels
            var dx = tox - fromx;
            var dy = toy - fromy;
            var angle = Math.atan2(dy, dx);
            context.moveTo(fromx, fromy);
            context.lineTo(tox, toy);
            context.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
            context.moveTo(tox, toy);
            context.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
        }
    </script> 







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
