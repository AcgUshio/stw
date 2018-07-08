$(function(){
 
	 $('.protab a').mouseover(function(){
													   $(this).addClass('on').siblings().removeClass('on');
													   var n=$('.protab a').index(this);
													   $('.showproinfo div').eq(n).show().siblings().hide();
													   });
	$('.h_left .menu ul li').mouseenter(function () { 
		 var n=$('.h_left .menu ul li').index(this);
		 if(n==0)return false;
	 	 $(this).find('dl').slideDown(500);
		 $(this).find('a').eq(0).addClass('bigon');
		 $('.menubg').slideDown(100);
	}).mouseleave(function () { 
	     $(this).find('dl').slideUp(500);
		 $('.menubg').slideUp(100);
		  $(this).find('a').eq(0).removeClass('bigon');
	});
	//
	$('.pglist_mid_list_dl dl.danxuan dd').click(function(){
														  var n=$(this).attr('lang');
														  if(n==1){
															 $(this).removeClass('on');
															 $(this).attr('lang',0); 
														  }else{
															 $(this).addClass('on').siblings().removeClass('on');
															 $(this).siblings().attr('lang',0);
															 $(this).attr('lang',1);
														  }
														 
														  });
	//
	$('.pglist_mid_list_dl dl.duoxuan dd').click(function(){
														  var n=$(this).attr('lang');
														  if(n==1){
															 $(this).removeClass('on');
															 $(this).attr('lang',0); 
														  }else{
															 $(this).addClass('on');
															 
															 $(this).attr('lang',1);
														  }
														 
														  });
	//
	$('.pgs_mid_mid ul li.t1 input').click(function(){
											  $(this).parent().find('dl').show();
											  });
	$('.pgs_mid_mid ul li dl dd').click(function(){
											  $(this).parent().parent().find('input').val($(this).html());
											  $('.pgs_mid_mid ul li dl').hide();
											  });
	//
	$('.pro_info_list ul li span').click(function(){
					   $(this).addClass('on').parent().siblings().find('span').removeClass('on');
					   });
	//
	$('.buynow').click(function(){
								$('body').append('<div class="mark"></div>');
								showDiv1('.showbox');
								});
	$('#closebaoxian a').click(function(){
										 $('.showbox').fadeOut();
										 $('.mark').remove();
										 });
	//
	$('.qlist ul li dl dd').click(function(){
										   $(this).addClass('on').siblings().removeClass('on');
										   });
	//
	$('.login_link').click(function(){
										 $('body').append('<div class="mark"></div>');
								showDiv1('.loginbox');
										 });
	$('#closelogin a').click(function(){
										 $('.loginbox').fadeOut();
										 $('.mark').remove();
										 });
	//
	$('.user_info_mid ul li input.sex').click(function(){
											 
											  $(this).parent().children('dl').show();
											  });
	$('.user_info_mid ul li dl dd').click(function(){
											  $(this).parent().parent().find('input').val($(this).html());
											  $('.user_info_mid ul li dl').hide();
											  });
	//
	$('.user_link').mouseenter(function () { 
		 $('.usertopmenu').slideDown(200);
	});
	$('.h_right,.usertopmenu').mouseleave(function () { 
		 $('.usertopmenu').slideUp(200);
	});
	//
	$('.uadd_edit .btn1').click(function(){
										    var f=$(this).parent().parent().hasClass('on');
										 	if(f==true){
												$(this).parent().parent().removeClass('on');
												$(this).html('设为默认');
											}else{
												$('.uadd ul li').removeClass('on');
												$('.uadd_edit a.btn1').html('设为默认');
												$(this).parent().parent().addClass('on');	
												$(this).html('取消默认');
												}
										 });

if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
	new WOW().init();
};
	
});
function showmask1() { 
		var bh = $("body").height(); 
		var bw = $("body").width(); 
		$(".mark").css({ height: bh, width: bw }); 
		$('.mark').fadeIn(); 
} 
function showDiv1(obj) { 
center1(obj); 
$(obj).fadeIn(); 
showmask1(); 
$(window).scroll(function() { 
center1(obj); 
}); 
$(window).resize(function() { 
center1(obj); 
}); 
} 
function center1(obj) { 
var windowWidth = document.documentElement.clientWidth; 
var windowHeight = document.documentElement.clientHeight; 
var popupHeight = $(obj).height(); 
var popupWidth = $(obj).width(); 
$(obj).css(
{ 
"position": "absolute", 
"top": (windowHeight - popupHeight) / 2 + $(document).scrollTop(), 
"left": (windowWidth - popupWidth) / 2 
}
); 
}