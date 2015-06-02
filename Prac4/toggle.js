<script type="text/javascript">
								function toggle1(el,x){
									var contentId = document.getElementById(x);
									if(el.className!="hide")
									{
										el.src="icon/hide.png"
										el.className="hide";
									}
									else if(el.className=="moreinfo")
									{
										el.src="icon/moreinfo.png"
										el.className="moreinfo";
									}
									else if(el.className!="moreinfo")
									{
										el.src="icon/moreinfo.png"
										el.className="moreinfo";
									}
									else if(el.className=="hide")
									{
										el.src="icon/hide.png"
										el.className="hide";
									}
									contentId.style.display == "none" ? contentId.style.display = "block" : 
								contentId.style.display = "none"; 
									return false;
								}  </script>