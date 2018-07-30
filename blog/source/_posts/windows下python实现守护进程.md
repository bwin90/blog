---
title: windows下python实现守护进程
date: 2018-07-05 16:35:19
tags:
categories: Python
---
windows下的后台进程是通过【服务】实现的，路径：计算机 -> 管理 -> 服务和应用程序 -> 服务 可以查看服务列表， 
我们可以在服务列表对其进行控制（启动、停止、重启动）。接下来，我们就来看看如何利用python实现一个服务。
<!-- more -->
准备 
python 
pywin32（python的win32库）

服务类 
其核心类为win32serviceutil.ServiceFramework，实现我们自己的服务只需要继承该类即可。

成员变量： 
_svc_name_ = “your service name” 
_svc_display_name_ = “your service display name” 
_svc_description_ = “your service description”

方法： 
SvcDoRun 启动该服务的回调 
SvcStop 结束该服务的回调 
一般来说，程序的主逻辑放到SvcDoRun 里，程序结束的逻辑放到SvcStop 里。ServiceFramework 自己有一套对服务的控制机制，大概是如下的样子：

install     ->      调用windows服务API来安装一个服务
remove     ->     调用windows服务API来卸载一个服务
start     ->     SvcDoRun 
stop     ->     SvcStop 
restart     ->     SvcStop  -> SvcDoRun 

另外，在python程序的main下， 要使用pywin32的接口来指定需要通过命令行执行的类：

 win32serviceutil.HandleCommandLine(ServiceClass)

例子

import win32serviceutil
import win32service
import win32event
import os
import logging
import inspect
import sys
import servicemanager


class PythonService(win32serviceutil.ServiceFramework):
    _svc_name_ = "PythonService"
    _svc_display_name_ = "Python Service Test"
    _svc_description_ = "This is a python service test code "

    def __init__(self, args):
        win32serviceutil.ServiceFramework.__init__(self, args)
        self.hWaitStop = win32event.CreateEvent(None, 0, 0, None)
        self.logger = self._getLogger()
        self.run = True

    def _getLogger(self):
        logger = logging.getLogger('[PythonService]')

        this_file = inspect.getfile(inspect.currentframe())
        dirpath = os.path.abspath(os.path.dirname(this_file))
        handler = logging.FileHandler(os.path.join(dirpath, "service.log"))

        formatter = logging.Formatter('%(asctime)s %(name)-12s %(levelname)-8s %(message)s')
        handler.setFormatter(formatter)

        logger.addHandler(handler)
        logger.setLevel(logging.INFO)

        return logger

    def SvcDoRun(self):
        import time
        self.logger.info("service is run....")
        while self.run:
            self.logger.info("I am runing....")
            time.sleep(2)
        # win32event.WaitForSingleObject(self.hWaitStop, win32event.INFINITE)

    def SvcStop(self):
        self.logger.info("service is stop....")
        self.ReportServiceStatus(win32service.SERVICE_STOP_PENDING)
        win32event.SetEvent(self.hWaitStop)
        self.run = False


if __name__ == '__main__':
        win32serviceutil.HandleCommandLine(PythonService)

安装服务： python PythonService.py install 
启动服务： python PythonService.py start 
关闭服务： python PythonService.py stop 
重启服务： python PythonService.py restart 
卸载服务： python PythonService.py remove

注意事项

启动服务时，报错Error starting service: 服务没有及时响应启动或控制请求。 
解决方案：把python可执行文件的路径添加到系统变量的Path中，而不仅仅在用户的系统变量中添加
