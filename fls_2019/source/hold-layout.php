elseif {
					echo (!empty($callout_image)?'<div class="img col-12 col-md-4"><img src="'.$callout_image['url'].'" class="img-fluid"></div><div class="content text-center text-md-left col-12 col-md-8">'.PHP_EOL:'<div class="content text-center text-md-left col-12">');
					echo (!empty($callout_title)?'<h3>'.$callout_title.'</h3>'.PHP_EOL:'');
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
				}