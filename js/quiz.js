function nextQ(number) {
    close_section = "#section_" + number;
    $(close_section).css("display","none");
    open_section = "#section_" + (number+1);
    $(open_section).fadeIn();
}
