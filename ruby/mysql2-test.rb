require 'mysql2'
class Db
	  attr_accessor :dbcon
	  def initialize()
		self.dbcon=Mysql2::Client.new(
			:host     => '127.0.0.1', # 主机
			:username => 'root',      # 用户名
			:password => 'root',    # 密码
			:port => '3306',           #端口
			:database => 'test',      # 数据库
			:encoding => 'utf8'       # 编码
		)
	  end
	  def cmdsql(sql)
		self.dbcon.query(sql)
	  end
	  def onesql(sql)
		self.dbcon.query(sql).first
	  end
	  def rows
		self.dbcon.affected_rows
	  end
	  def close_db
		self.dbcon.close
	  end
	  def last_id
		self.dbcon.last_id
	  end
end