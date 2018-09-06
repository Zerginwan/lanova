(function($){
  $(function(){
// M.AutoInit();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.tabs').tabs({swipeable: false});
    $('.fixed-action-btn').floatingActionButton();
    $('select').formSelect();
    $('.datepicker').datepicker({
		format: 'dd-mm-yyyy',
		i18n:{
			clear: 'Очистить',
			done: 'ОК',
			cancel: 'Отмена',
			weekdaysAbbrev:	['В','П','В','С','Ч','П','С'],
			months:[
  'Январь',
  'Февраль',
  'Март',
  'Апрель',
  'Май',
  'Июнь',
  'Июль',
  'Август',
  'Сентябрь',
  'Октябрь',
  'Ноябрь',
  'Декабрь'
]

		},
		firstDay: 1,
		showClearBtn: true,
		yearRange: 31,
		defaultDate: new Date(2480, 0, 1)
	});
    M.updateTextFields();

  }); // end of document ready
})(jQuery); // end of jQuery name space
