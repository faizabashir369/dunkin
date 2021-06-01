/*!
 * Fawad Tariq (http://github.com/fawadtariq)
 * Materialize Date Time Picker v0.1.1-beta
 * Based on Materialize (http://materializecss.com)
 */


var dateToday = new Date();
var dateval="";
var MaterialDateTimePicker = {
    control: null,
    dateRange: null,
    pickerOptions: null,
    
    create: function(element){
        this.control = element === undefined? $('#' + localStorage.getItem('element')) : element;
        element = this.control;
        if (this.control.is("input[type='text']"))
        {
            var defaultDate = new Date();
            element.off('click');
            element.datepicker({
                format:  'dd mmm',
                defaultDate: new Date(),
                selectMonths: true,
                dismissable: true,
                minDate: dateToday,
                autoClose: true,
                onClose: function(){
                    element.datepicker('destroy');
                    element.timepicker({
                        defaultTime: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 1200000,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: true, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} ,//Function for after opening timepicker 
                        onSelect: function(hr, min){
                            element.attr('selectedTime', (hr + "." + min).toString());
                            console.log("Time Changed");
                        },
                        onCloseEnd: function(){
                           element.blur();
                       }
                    });
                    $('button.btn-flat.timepicker-close.waves-effect')[0].remove();
                    var dateval=element.val();
                    localStorage.setItem("selectedDate",dateval);
                    
                    if(element.val() != "")
                    {
                        element.attr('selectedDate', element.val().toString());
                    }
                    else
                    {
                        element.val(defaultDate.getFullYear() + "-" + (defaultDate.getMonth() + 1) + "-" + defaultDate.getDate())
                        element.attr('selectedDate', element.val().toString());
                    }
                    element.timepicker('open');
                }
            });
            element.unbind('change');
            element.off('change');
            element.on('change', function(){
                console.log("Time Changed");
                if(element.val().indexOf(':') > -1){
                    
                    var time = element.val();
                   
                    var hours = Number(time.match(/^(\d+)/)[1]);
                    var minutes = Number(time.match(/:(\d+)/)[1]);
                    var AMPM = time.match(/\s(.*)$/)[1];
                    if(AMPM == "PM" && hours<12) hours = hours+12;
                    if(AMPM == "AM" && hours==12) hours = hours-12;
                    var sHours = hours.toString();
                    var sMinutes = minutes.toString();
                    
                    if(hours<10) sHours = "0" + sHours;
                    if(minutes<10) sMinutes = "0" + sMinutes;
                    
                    var checkDate=defaultDate.getFullYear() + "-" + (defaultDate.getMonth() + 1) + "-" + defaultDate.getDate();
                    //alert(localStorage.getItem("selectedDate"));
                    //alert(checkDate);
                    const d = new Date(localStorage.getItem("selectedDate"));
                    //const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                    const mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
                    const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
                    //alert(`${da} ${mo}`);
                    //localStorage.getItem("selectedDate")
                    if(localStorage.getItem("selectedDate")==`${da} ${mo}`)
                    {
                        //alert("today");
                        
                        //alert(defaultDate.getMinutes());
                        //alert(defaultDate.getHours());
                        //alert(sHours);
                        // alert(sMinutes);
                        if(defaultDate.getHours() >= sHours)
                        {
                            
                            var nowTime=parseInt(defaultDate.getMinutes()+20,10);
                            
                            var selecTime=parseInt(sMinutes,10);
                            
                            //alert(nowTime);
                            //alert(selecTime);
                            
                            if(nowTime >= selecTime)
                            {
                                // console.log("Selected time must be 20 minutes ahead of current time");
                                Swal.fire({
                                          title: "Dunkin KSA",
                                          showCloseButton: false,
                                          showConfirmButton:true,
                                          html:
                                          '<p class="trans-rejected">Selected time must be 20 minutes ahead of current time</p>',
                                          width:'690px',
                                          customClass: 'success-msg',
                                          background: '#fff',
                                          backdrop: `
                                           rgba(38, 38, 38, 0.8);
                                          `
                                        });
                                        element.val("");
                                        document.getElementById("datetime").value="";
                                        return false;
                            }
                        }
                    }
                   
                    element.attr('selectedTime', element.val().toString());
                    element.val(time+" "+element.attr('selectedDate'));
                    element.timepicker('destroy');
                    element.unbind('click');
                    element.off('click');
                    element.on('click', function(e){
                        element.val("");
                        element.removeAttr("selectedDate");
                        element.removeAttr("selectedTime");
                        localStorage.setItem('element', element.attr('id'));
                        MaterialDateTimePicker.create.call(element);
                        element.trigger('click');
                    });
                }
            });
            $('button.btn-flat.datepicker-cancel.waves-effect, button.btn-flat.datepicker-done.waves-effect').remove();
            this.addCSSRules();
            return element;
        }
        else
        {
            console.error("The HTML Control provided is not a valid Input Text type.")
        }
    },
    addCSSRules: function(){
        $('html > head').append($('<style>div.modal-overlay { pointer-events:none; }</style>'));
    },
}