require 'watir'
require 'uri'
class Login
  def initialize( name, phone,url)
    @name=name
    @phone=phone
    @url=url
    # @browser= Watir::Browser.new :chrome, headless: true
    @browser = Watir::Browser.new #默认谷歌
  end
  def doLogin()
    @browser.goto "#@url"
    @browser.text_field(name:'UserNameInput').set("#@name")
    @browser.text_field(name:'PasswordInput').set("#@phone")
    @browser.link(text:"登 录").click
    #如果登陆成功则跳转到用户中心
    @browser.goto "https://account.ch.com/order/flights?t_id=3&m_id=1/"
    all_elements= @browser.element(class:"order").text
    puts all_elements
=begin
    link = @browser.link(index:1)
    puts link
    puts link.text
    puts link.flash
=end
=begin
    if  @browser.contains_text("working...")
      puts "working..."
    else
      puts "error"
    end
=end
  end
  def details(url)
    @browser.goto url
  end
  def writeLog(val)
    outFile = File.new("test.txt", "w")
    outFile.puts val
    outFile.close
  end
end
username='13216904415'
password='wsk190120'
url="https://passport.ch.com/zh_cn/Login/NormalPC?ReturnUrl=http%3A%2F%2Ftrippages.ch.com%2FSpecial%2Fs181114tg%2Findex.aspx%3Fintcmp%3Dguolvtaiguo_181119_homeflash5&wtrealm=http://trip.ch.com"
object = Login.new(username,password,url)
object.doLogin