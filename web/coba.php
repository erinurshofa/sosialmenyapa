<!DOCTYPE html>
<html>
<head>
	<title>100 Colorful Ticks with Random Effects</title>
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		
		.tick {
			display: inline-block;
			width: 16px;
			height: 16px;
			border-radius: 50%;
			margin: 5px;
			animation: pulse 1s ease-in-out infinite;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
			transform-origin: center;
			transform: scale(1);
			transition: transform 0.3s ease-in-out;
		}
		
		.tick:hover {
			transform: scale(1.2);
		}
		
		.tick.glossy {
			background: linear-gradient(45deg, #00c6ff, #0072ff);
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
		}
		
		.tick.gradient {
			background: linear-gradient(45deg, #ff00cc, #333399);
		}
		
		.tick.shadow {
			background-color: #1abc9c;
			box-shadow: 0 5px 10px rgba(26, 188, 156, 0.4), 0 8px 20px rgba(26, 188, 156, 0.2);
		}
		
		.tick.glow {
			background-color: #e74c3c;
			box-shadow: 0 0 20px #e74c3c;
		}
		
		.tick.random {
			animation-name: random;
			animation-duration: 0.5s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
		}
		
		@keyframes pulse {
			0% {
				transform: scale(1);
			}
			50% {
				transform: scale(1.1);
			}
			100% {
				transform: scale(1);
			}
		}
		
		@keyframes random {
			0% {
				transform: translate(0);
			}
			25% {
				transform: translate(10px, 0);
			}
			50% {
				transform: translate(0, 10px);
			}
			75% {
				transform: translate(-10px, 0);
			}
			100% {
				transform: translate(0, -10px);
			}
		}
		.tick-icon {
			width: 30px;
			height: 30px;
			background-color: #ff6666;
			border-radius: 50%;
			/* animation: pulse 1s ease-in-out infinite; */
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.tick-icon:hover{
			animation: pulse 1s ease-in-out infinite;
		}
		.a-1{
			background-color: #E97777;
		}
		.a-2{
			background-color: #FF9F9F;
		}
		.a-3{
			background-color: #FCDDB0;
		}
		.a-4{
			background-color: #FFFAD7;
		}

		.b-1{
			background-color: #FF8787;
		}
		.b-2{
			background-color: #F8C4B4;
		}
		.b-3{
			background-color: #E5EBB2;
		}
		.b-4{
			background-color: #BCE29E;
		}

		.green{
			background-color: green;
		}
		.blue{
			background-color: blue;
		}
		.red{
			background-color: red;
		}
		.yellow{
			background-color: yellow;
		}
		.violet{
			background-color: violet;
		}

		.tick-icon::before {
			content: '\2713';
			font-size: 20px;
			color: white;
		}

/* .tick-icon:hover {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
} */

	</style>
</head>
<body>
	<div class="container">
		<?php
			// for ($i = 0; $i < 100; $i++) {
			// 	$classes = array('glossy', 'gradient', 'shadow', 'glow', 'random');
			// 	$class = $classes[array_rand($classes)];
			// 	echo '<span class="tick '.$class.'"></span>';
			// }
		?>
		<!-- <span class="tick-icon"></span> -->
		<span class="tick-icon a-1"></span>
		<span class="tick-icon a-2"></span>
		<span class="tick-icon a-3"></span>
		<span class="tick-icon a-4"></span>
			<p>
		<span class="tick-icon red"></span>
		<span class="tick-icon yellow"></span>
		<span class="tick-icon green"></span>
		<span class="tick-icon blue"></span>
		<span class="tick-icon violet"></span>
			</p>
			<span class="tick-icon b-1"></span>
		<span class="tick-icon b-2"></span>
		<span class="tick-icon b-3"></span>
		<span class="tick-icon b-4"></span>
	</div>
</body>
</html>
