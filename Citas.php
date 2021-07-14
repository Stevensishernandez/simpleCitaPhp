

<!-- Call the header.php for use many times -->
<?php include("includes/header.php"); ?>

<!-- Body starts here -->
<br>
<div class="container p-4">

    <div class="row">
        <div class="col-md-8">
            <div id="CalendarioWeb">
                
        </div>

    </div>

</div>

<script>
    $(document).ready(
        function(){
            $('#CalendarioWeb').fullCalendar(
                {
                    header: {
                        left : 'today, prev, next',
                        center: 'title',
                        right: 'month, basicWeek, basicDay'
                    },
                   
                    events: 'events.php'
                        
                    
                }
            );
        }
    );
</script>

<!-- Call the footer.php for use many times -->
<?php include("includes/footer.php"); ?>