<?php
require('config/dbconnect.php');
$sql = "SELECT*FROM rith_jobcase";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">



	<link rel="stylesheet" type="text/css" href="table.css">

	<meta name="robots" content="noindex, follow">
	<script nonce="ae280d0b-1817-478b-8d0f-ae859fcb4450">
		(function(w, d) {
			! function(e, f, g, h) {
				e.zarazData = e.zarazData || {};
				e.zarazData.executed = [];
				e.zaraz = {
					deferred: [],
					listeners: []
				};
				e.zaraz.q = [];
				e.zaraz._f = function(i) {
					return function() {
						var j = Array.prototype.slice.call(arguments);
						e.zaraz.q.push({
							m: i,
							a: j
						})
					}
				};
				for (const k of ["track", "set", "debug"]) e.zaraz[k] = e.zaraz._f(k);
				e.zaraz.init = () => {
					var l = f.getElementsByTagName(h)[0],
						m = f.createElement(h),
						n = f.getElementsByTagName("title")[0];
					n && (e.zarazData.t = f.getElementsByTagName("title")[0].text);
					e.zarazData.x = Math.random();
					e.zarazData.w = e.screen.width;
					e.zarazData.h = e.screen.height;
					e.zarazData.j = e.innerHeight;
					e.zarazData.e = e.innerWidth;
					e.zarazData.l = e.location.href;
					e.zarazData.r = f.referrer;
					e.zarazData.k = e.screen.colorDepth;
					e.zarazData.n = f.characterSet;
					e.zarazData.o = (new Date).getTimezoneOffset();
					if (e.dataLayer)
						for (const r of Object.entries(Object.entries(dataLayer).reduce(((s, t) => ({
								...s[1],
								...t[1]
							}))))) zaraz.set(r[0], r[1], {
							scope: "page"
						});
					e.zarazData.q = [];
					for (; e.zaraz.q.length;) {
						const u = e.zaraz.q.shift();
						e.zarazData.q.push(u)
					}
					m.defer = !0;
					for (const v of [localStorage, sessionStorage]) Object.keys(v || {}).filter((x => x.startsWith(
						"_zaraz_"))).forEach((w => {
						try {
							e.zarazData["z_" + w.slice(7)] = JSON.parse(v.getItem(w))
						} catch {
							e.zarazData["z_" + w.slice(7)] = v.getItem(w)
						}
					}));
					m.referrerPolicy = "origin";
					m.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(e.zarazData)));
					l.parentNode.insertBefore(m, l)
				};
				["complete", "interactive"].includes(f.readyState) ? zaraz.init() : e.addEventListener(
					"DOMContentLoaded", zaraz.init)
			}(w, d, 0, "script");
		})(window, document);
	</script>
</head>

<body>

	<div class="containner card">
		<div class="card-body">
			<h5 class="card-title" All jobs</h5>
				<table class="thead-dark">
					<thead>
						<tr class="tablejob-head">
							<th class="column1">No</th>
							<th class="column2">Case ID</th>
							<th class="column3">Name</th>
							<th class="column4">Section</th>
							<th class="column5">Equipment Name</th>
							<th class="column6">Detail</th>
							<th class="column7">Management</th>
							<th class="column8">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td class="column1"></td>
								<td class="column2">
									<?php echo $row['job_id']; ?>
								</td>
								<td class="column3">
									<?php echo $row['job_user']; ?>
								</td>
								<td class="column4">
									<?php echo $row['job_sec']; ?>
								</td>
								<td class="column5">
									<?php echo $row['job_itemname']; ?>
								</td>
								<td class="column6">
									<?php echo $row['job_detail']; ?>
								</td>
								<td class="column7"><a href="#"><i class="bi bi-three-dots-vertical"></i></a></td>
								<td class="column8"><span class="badge bg-success">Success</span></td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
		</div>
	</div>
	</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76aed2953a474c8f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>
<script>
	var table = document.getElementsByTagName('table')[0],
		rows = table.getElementsByTagName('tr'),
		text = 'textContent' in document ? 'textContent' : 'innerText';
	console.log(text);
	for (var i = 1, len = rows.length; i < len; i++) {
		rows[i].children[0][text] = i + rows[i].children[0][text];
	}
</script>