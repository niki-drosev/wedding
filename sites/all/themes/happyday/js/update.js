// JavaScript Document

jQuery(function(){
				
	jQuery('.off-music a.music').remove();
	jQuery('.married').attr('id','married');
    jQuery('.our-parents').attr('id','our-parents');
    jQuery('.best-man').attr('id','best-man');
	jQuery('.our_story').attr('id','our_story');
	jQuery('.our_story.events').attr('id','events');
	jQuery('.guests').attr('id','guests');
	jQuery('.when_where').attr('id','when_where');
	jQuery('.hotel').attr('id','hotel');
	jQuery('.rsvp').attr('id','rsvp');
	jQuery('.gallery').attr('id','gallery');
	jQuery('.registry').attr('id','registry');
	jQuery('.content').attr('id','content');
	
	jQuery('.contact-form .form-item').addClass('txt_input');
	
	jQuery('.pagination ul.pager').removeAttr('class');
	//jQuery('.indented').addClass('reply');
});