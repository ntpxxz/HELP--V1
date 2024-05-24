<!DOCTYPE html>
<html>

<head>
    <title>Bandwidth Monitor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Make an AJAX request to the server-side script
            $.ajax({
                url: 'bandwidth_monitor.php',
                dataType: 'json',
                success: function(data) {
                    // Display the bandwidth usage on the page
                    $('#bandwidthUsage').text(data.bandwidth + ' Mbps');
                }
            });
        });
    </script>
</head>

<body>
    <h1>Bandwidth Monitor</h1>
    <div id="bandwidthUsage"></div>
</body>

</html>