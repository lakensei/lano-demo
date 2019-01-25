require 'watir'
require 'uri'

dpt=URI.encode "长沙"
arr=URI.encode "广州"
fdate='2018-11-28'
username='13216904415'
password='wsk190120'
name="\u51af\u5efa\u5382"
phone="15223545865"
idcard="620102197309095817"
contactname="\u5b97\u5728\u80dc"
contactphone="13216904415"
Watir.default_timeout = 60 #设置超时
browser = Watir::Browser.new #默认谷歌
browser.window.maximize()  #最大化窗口
browser.goto 'https://passport.ch.com/zh_cn/Login/NormalPC?ReturnUrl=http%3A%2F%2Ftrippages.ch.com%2FSpecial%2Fs181114tg%2Findex.aspx%3Fintcmp%3Dguolvtaiguo_181119_homeflash5&wtrealm=http://trip.ch.com'
browser.text_field(name:'UserNameInput').set("#{username}")
browser.text_field(name:'PasswordInput').set("#{password}")
browser.link(text:"登 录").click

sleep 1
# browser.goto 'https://flights.ch.com/'
# browser.link(:text,"机票").fire_event("onmouseover")
url="https://flights.ch.com/CSX-SHA.html?Departure=#{dpt}&Arrival=#{arr}&FDate=#{fdate}&ANum=1&CNum=0&INum=0&IfRet=false&SType=0&MType=0&IsNew=1"
browser.goto"#{url}"
browser.button(text:'订票').click
browser.input(xpath:'/html/body/div[3]/div[3]/div/div[1]/div[2]/div[2]/div[1]/div[2]/div[3]/div/div[2]/div[1]/div[2]/div/div[2]/input').click
browser.element(xpath:'/html/body/div[4]/div/div[1]/div[3]/ul/li').click
browser.span(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[1]/span').click #点击姓名
browser.input(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[1]/input').set("#{name}") #填写姓名
browser.span(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[2]/span').click
browser.input(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[2]/input[2]').set("#{phone}")
browser.span(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[4]/span').click
browser.input(xpath:'/html/body/div[4]/div/div[1]/ul[1]/li/ul[1]/li[4]/input').set("#{idcard}")
browser.span(xpath:'/html/body/div[4]/div/div[1]/ul[2]/li/ul[1]/li[1]/span').click
browser.input(xpath:'/html/body/div[4]/div/div[1]/ul[2]/li/ul[1]/li[1]/input').set("#{contactname}")
browser.span(xpath:'/html/body/div[4]/div/div[1]/ul[2]/li/ul[1]/li[1]/span').click
browser.input(xpath:'/html/body/div[4]/div/div[1]/ul[2]/li/ul[1]/li[2]/input[2]').set("#{contactphone}")
browser.checkbox(xpath:'//*[@id="J_agreement"]/input').set
browser.element(xpath:'/html/body/div[4]/div/div[1]/ul[3]/li[1]').click

=begin
browser.text_field(name:'OriCity').set('')
browser.text_field(name:'DestCity').set('深圳')
browser.text_field(name:'FDate').set('2018-12-01')
browser.a(id:'search-submit').click
=end
sleep 30