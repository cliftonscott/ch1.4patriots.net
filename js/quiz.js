function nextQ(number) {
    close_section = "#section_" + number;
    $(close_section).css("display","none");
    $(close_section).css("visibility","hidden");
    open_section = "#section_" + (number+1);
    $(open_section).css("display","block");
    $(open_section).css("visibility","visible");
}