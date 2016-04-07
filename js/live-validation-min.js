// LiveValidation 1.4 (standalone version)
// Copyright (c) 2007-2008 Alec Hill (www.livevalidation.com)
// LiveValidation is licensed under the terms of the MIT License
var LiveValidation=function(e,i){this.initialize(e,i)};LiveValidation.VERSION="1.4 standalone",LiveValidation.TEXTAREA=1,LiveValidation.TEXT=2,LiveValidation.PASSWORD=3,LiveValidation.CHECKBOX=4,LiveValidation.SELECT=5,LiveValidation.FILE=6,LiveValidation.OPTIONS={validMessage:"Thank you!",insertAfterWhatNode:null,onlyOnBlur:!1,wait:0,onlyOnSubmit:!1,onValid:function(){this.insertMessage(this.createMessageSpan()),this.addFieldClass()},onInvalid:function(){this.insertMessage(this.createMessageSpan()),this.addFieldClass()}},LiveValidation.massValidate=function(e){for(var i=!0,t=0,a=e.length;a>t;++t){var n=e[t].validate();i&&(i=n)}return i},LiveValidation.prototype={validClass:"LV_valid",invalidClass:"LV_invalid",messageClass:"LV_validation_message",validFieldClass:"LV_valid_field",invalidFieldClass:"LV_invalid_field",initialize:function(e,i){var t=this;if(!e)throw Error("LiveValidation::initialize - No element reference or element id has been provided!");if(this.element=e.nodeName?e:document.getElementById(e),!this.element)throw Error("LiveValidation::initialize - No element with reference or id of '"+e+"' exists!");this.validations=[],this.elementType=this.getElementType(),this.form=this.element.form;var a=i||{};this.validMessage=a.validMessage||a.validMessage!==!1&&LiveValidation.OPTIONS.validMessage;var n=a.insertAfterWhatNode||LiveValidation.OPTIONS.insertAfterWhatNode||this.element;if(this.insertAfterWhatNode=n.nodeType?n:document.getElementById(n),this.onlyOnBlur=a.onlyOnBlur||LiveValidation.OPTIONS.onlyOnBlur,this.wait=a.wait||LiveValidation.OPTIONS.wait,this.onlyOnSubmit=a.onlyOnSubmit||LiveValidation.OPTIONS.onlyOnSubmit,this.beforeValidation=a.beforeValidation||LiveValidation.OPTIONS.beforeValidation||function(){},this.beforeValid=a.beforeValid||LiveValidation.OPTIONS.beforeValid||function(){},this.onValid=a.onValid||LiveValidation.OPTIONS.onValid,this.afterValid=a.afterValid||LiveValidation.OPTIONS.afterValid||function(){},this.beforeInvalid=a.beforeInvalid||LiveValidation.OPTIONS.beforeInvalid||function(){},this.onInvalid=a.onInvalid||LiveValidation.OPTIONS.onInvalid,this.afterInvalid=a.afterInvalid||LiveValidation.OPTIONS.afterInvalid||function(){},this.afterValidation=a.afterValidation||LiveValidation.OPTIONS.afterValidation||function(){},this.form&&(this.formObj=LiveValidationForm.getInstance(this.form),this.formObj.addField(this)),this.oldOnFocus=this.element.onfocus||function(){},this.oldOnBlur=this.element.onblur||function(){},this.oldOnClick=this.element.onclick||function(){},this.oldOnChange=this.element.onchange||function(){},this.oldOnKeyup=this.element.onkeyup||function(){},this.element.onfocus=function(e){return t.doOnFocus(e),t.oldOnFocus.call(this,e)},!this.onlyOnSubmit)switch(this.elementType){case LiveValidation.CHECKBOX:this.element.onclick=function(e){return t.validate(),t.oldOnClick.call(this,e)};case LiveValidation.SELECT:case LiveValidation.FILE:this.element.onchange=function(e){return t.validate(),t.oldOnChange.call(this,e)};break;default:this.onlyOnBlur||(this.element.onkeyup=function(e){return t.deferValidation(),t.oldOnKeyup.call(this,e)}),this.element.onblur=function(e){return t.doOnBlur(e),t.oldOnBlur.call(this,e)}}},destroy:function(){if(this.formObj&&(this.formObj.removeField(this),this.formObj.destroy()),this.element.onfocus=this.oldOnFocus,!this.onlyOnSubmit)switch(this.elementType){case LiveValidation.CHECKBOX:this.element.onclick=this.oldOnClick;case LiveValidation.SELECT:case LiveValidation.FILE:this.element.onchange=this.oldOnChange;break;default:this.onlyOnBlur||(this.element.onkeyup=this.oldOnKeyup),this.element.onblur=this.oldOnBlur}this.validations=[],this.removeMessageAndFieldClass()},add:function(e,i){return this.validations.push({type:e,params:i||{}}),this},remove:function(e,i){for(var t=[],a=0,n=this.validations.length;n>a;a++){var l=this.validations[a];l.type!=e&&l.params!=i&&t.push(l)}return this.validations=t,this},deferValidation:function(){this.wait<300||this.removeMessageAndFieldClass();var e=this;this.timeout&&clearTimeout(e.timeout),this.timeout=setTimeout(function(){e.validate()},e.wait)},doOnBlur:function(e){this.focused=!1,this.validate(e)},doOnFocus:function(){this.focused=!0,this.removeMessageAndFieldClass()},getElementType:function(){var e=this.element.nodeName.toUpperCase(),i=this.element.type.toUpperCase();switch(!0){case"TEXTAREA"==e:return LiveValidation.TEXTAREA;case"INPUT"==e&&"TEXT"==i:return LiveValidation.TEXT;case"INPUT"==e&&("EMAIL"==i||"URL"==i||"TEL"==i||"NUMBER"==i||"RANGE"==i):return LiveValidation.TEXT;case"INPUT"==e&&"PASSWORD"==i:return LiveValidation.PASSWORD;case"INPUT"==e&&"CHECKBOX"==i:return LiveValidation.CHECKBOX;case"INPUT"==e&&"FILE"==i:return LiveValidation.FILE;case"SELECT"==e:return LiveValidation.SELECT;case"INPUT"==e:throw Error("LiveValidation::getElementType - Cannot use LiveValidation on an "+i.toLowerCase()+" input!");default:throw Error("LiveValidation::getElementType - Element must be an input, select, or textarea - "+e.toLowerCase()+" was given!")}},doValidations:function(){this.validationFailed=!1;for(var e=0,i=this.validations.length;i>e;++e)if(this.validationFailed=!this.validateElement(this.validations[e].type,this.validations[e].params),this.validationFailed)return!1;return this.message=this.validMessage,!0},validateElement:function(e,i){switch(e){case Validate.Presence:case Validate.Confirmation:case Validate.Acceptance:this.displayMessageWhenEmpty=!0;break;case Validate.Custom:i.displayMessageWhenEmpty&&(this.displayMessageWhenEmpty=!0)}var t="";if(this.elementType==LiveValidation.SELECT?this.element.selectedIndex<0||(t=this.element.options[this.element.selectedIndex].value):t=this.element.value,e==Validate.Acceptance){if(this.elementType!=LiveValidation.CHECKBOX)throw Error("LiveValidation::validateElement - Element to validate acceptance must be a checkbox!");t=this.element.checked}var a=!0;try{e(t,i)}catch(n){if(!(n instanceof Validate.Error))throw n;(""!==t||""===t&&this.displayMessageWhenEmpty)&&(this.validationFailed=!0,this.message=n.message.split("\n")[0],a=!1)}finally{return a}},validate:function(){if(this.element.disabled)return!0;this.beforeValidation();var e=this.doValidations();return e?(this.beforeValid(),this.onValid(),this.afterValid(),this.afterValidation(),!0):(this.beforeInvalid(),this.onInvalid(),this.afterInvalid(),this.afterValidation(),!1)},enable:function(){return this.element.disabled=!1,this},disable:function(){return this.element.disabled=!0,this.removeMessageAndFieldClass(),this},createMessageSpan:function(){var e=document.createElement("span"),i=document.createTextNode(this.message);return e.appendChild(i),e},insertMessage:function(e){if(this.removeMessage(),(this.validationFailed||this.validMessage)&&(this.displayMessageWhenEmpty&&(this.elementType==LiveValidation.CHECKBOX||""==this.element.value)||""!=this.element.value)){var i=this.validationFailed?this.invalidClass:this.validClass;e.className+=" "+this.messageClass+" "+i;var t=this.insertAfterWhatNode.parentNode;this.insertAfterWhatNode.nextSibling?t.insertBefore(e,this.insertAfterWhatNode.nextSibling):t.appendChild(e)}},addFieldClass:function(){this.removeFieldClass(),this.validationFailed?-1==this.element.className.indexOf(this.invalidFieldClass)&&(this.element.className+=" "+this.invalidFieldClass):(this.displayMessageWhenEmpty||""!=this.element.value)&&-1==this.element.className.indexOf(this.validFieldClass)&&(this.element.className+=" "+this.validFieldClass)},removeMessage:function(){for(var e,i=this.insertAfterWhatNode;i.nextSibling;){if(1===i.nextSibling.nodeType){e=i.nextSibling;break}i=i.nextSibling}e&&-1!=e.className.indexOf(this.messageClass)&&this.insertAfterWhatNode.parentNode.removeChild(e)},removeFieldClass:function(){var e=this.element.className;-1!=e.indexOf(this.invalidFieldClass)&&(this.element.className=e.split(this.invalidFieldClass).join("")),-1!=e.indexOf(this.validFieldClass)&&(this.element.className=e.split(this.validFieldClass).join(" "))},removeMessageAndFieldClass:function(){this.removeMessage(),this.removeFieldClass()}};var LiveValidationForm=function(e){this.initialize(e)};LiveValidationForm.instances={},LiveValidationForm.getInstance=function(e){if(!e)throw Error("LiveValidationForm::getInstance - No element reference or element id has been provided!");var i=e.nodeName?e:document.getElementById(e),t=Math.random()*Math.random();return i.id||(i.id="formId_"+(""+t).replace(/\./,"")+(new Date).valueOf()),LiveValidationForm.instances[i.id]||(LiveValidationForm.instances[i.id]=new LiveValidationForm(i)),LiveValidationForm.instances[i.id]},LiveValidationForm.prototype={beforeValidation:function(){},onValid:function(){},onInvalid:function(){},afterValidation:function(){},initialize:function(e){this.name=e.id,this.element=e,this.fields=[],this.oldOnSubmit=this.element.onsubmit||function(){};var i=this;this.element.onsubmit=function(e){var t=!1;return i.beforeValidation(),i.valid=LiveValidation.massValidate(i.fields),i.valid?i.onValid():i.onInvalid(),i.afterValidation(),i.valid&&(t=i.oldOnSubmit.call(this,e||window.event)!==!1),t?void 0:t}},addField:function(e){this.fields.push(e)},removeField:function(e){for(var i=[],t=0,a=this.fields.length;a>t;t++)this.fields[t]!==e&&i.push(this.fields[t]);this.fields=i},destroy:function(e){return 0==this.fields.length||e?(this.element.onsubmit=this.oldOnSubmit,LiveValidationForm.instances[this.name]=null,!0):!1}};var Validate={Presence:function(e,i){var i=i||{},t=i.failureMessage||"Can't be empty!";return(""===e||null===e||void 0===e)&&Validate.fail(t),!0},Numericality:function(e,i){var t=e,e=+e,i=i||{},a=i.minimum||0==i.minimum?i.minimum:null,n=i.maximum||0==i.maximum?i.maximum:null,l=i.is||0==i.is?i.is:null,s=i.notANumberMessage||" ",o=i.notAnIntegerMessage||"Must be an integer!",d=i.wrongNumberMessage||"Must be "+l+"!",r=i.tooLowMessage||"Must not be less than "+a+"!",h=i.tooHighMessage||"Must not be more than "+n+"!";switch(isFinite(e)||Validate.fail(s),i.onlyInteger&&(/\.0+$|\.$/.test(t+"")||e!=parseInt(e))&&Validate.fail(o),!0){case null!==l:e!=+l&&Validate.fail(d);break;case null!==a&&null!==n:Validate.Numericality(e,{tooLowMessage:r,minimum:a}),Validate.Numericality(e,{tooHighMessage:h,maximum:n});break;case null!==a:+a>e&&Validate.fail(r);break;case null!==n:e>+n&&Validate.fail(h)}return!0},Format:function(e,i){var e=e+"",i=i||{},t=i.failureMessage||"Not valid!",a=i.pattern||/./,n=i.negate||!1;return n||a.test(e)||Validate.fail(t),n&&a.test(e)&&Validate.fail(t),!0},Email:function(e,i){var i=i||{},t=i.failureMessage||"Must be a valid email address!";return Validate.Format(e,{failureMessage:t,pattern:/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i}),!0},Length:function(e,i){var e=e+"",i=i||{},t=i.minimum||0==i.minimum?i.minimum:null,a=i.maximum||0==i.maximum?i.maximum:null,n=i.is||0==i.is?i.is:null,l=i.wrongLengthMessage||"Must be "+n+" characters long!",s=i.tooShortMessage||" ",o=i.tooLongMessage||" ";switch(!0){case null!==n:e.length!=+n&&Validate.fail(l);break;case null!==t&&null!==a:Validate.Length(e,{tooShortMessage:s,minimum:t}),Validate.Length(e,{tooLongMessage:o,maximum:a});break;case null!==t:e.length<+t&&Validate.fail(s);break;case null!==a:e.length>+a&&Validate.fail(o);break;default:throw Error("Validate::Length - Length(s) to validate against must be provided!")}return!0},Inclusion:function(e,i){var i=i||{},t=i.failureMessage||"Must be included in the list!",a=i.caseSensitive===!1?!1:!0;if(i.allowNull&&null==e)return!0;i.allowNull||null!=e||Validate.fail(t);var n=i.within||[];if(!a){for(var l=[],s=0,o=n.length;o>s;++s){var d=n[s];"string"==typeof d&&(d=d.toLowerCase()),l.push(d)}n=l,"string"==typeof e&&(e=e.toLowerCase())}for(var r=!1,h=0,o=n.length;o>h;++h)n[h]==e&&(r=!0),i.partialMatch&&-1!=e.indexOf(n[h])&&(r=!0);return(!i.negate&&!r||i.negate&&r)&&Validate.fail(t),!0},Exclusion:function(e,i){var i=i||{};return i.failureMessage=i.failureMessage||"Must not be included in the list!",i.negate=!0,Validate.Inclusion(e,i),!0},Confirmation:function(e,i){if(!i.match)throw Error("Validate::Confirmation - Error validating confirmation: Id of element to match must be provided!");var i=i||{},t=i.failureMessage||"Does not match!",a=i.match.nodeName?i.match:document.getElementById(i.match);if(!a)throw Error("Validate::Confirmation - There is no reference with name of, or element with id of '"+i.match+"'!");return e!=a.value&&Validate.fail(t),!0},Acceptance:function(e,i){var i=i||{},t=i.failureMessage||"Must be accepted!";return e||Validate.fail(t),!0},Custom:function(e,i){var i=i||{},t=i.against||function(){return!0},a=i.args||{},n=i.failureMessage||"Not valid!";return t(e,a)||Validate.fail(n),!0},now:function(e,i,t){if(!e)throw Error("Validate::now - Validation function must be provided!");var a=!0;try{e(i,t||{})}catch(n){if(!(n instanceof Validate.Error))throw n;a=!1}finally{return a}},fail:function(e){throw new Validate.Error(e)},Error:function(e){this.message=e,this.name="ValidationError"}};
