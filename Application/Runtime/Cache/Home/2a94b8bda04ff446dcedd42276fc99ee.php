<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://mockjs.com/dist/mock.js"></script>
</head>
<body>
<h1>PARSE_VAR</h1>
在开发时（debug），为了便于前端程序员查看后端PHP分配过来的变量，将后台thinkPHP通过assign分配过来的变量以json对象形式放在页面中。<br/>
前端程序员可以在浏览器中通过输入：PARSE_VAR 来查看PHP分配给页面的变量。

<h1>为什么要这样做？</h1>
1. 现在许多前端自动化开发工具，都会将开发好的页面自动发布到一个：联调环境，这是一个前端页面和后端PHP变量联调的环境。<br/>
2. 我在开发过程中发现：当前后端在联调开发时，前端程序员在完成页面效果以后，由于没有PHP环境，只能将做好的静态页面给PHP程序员。<br/>
	PHP程序员必须切割页面、继承和渲染页面，但是对页面最清楚和了解的时前端开发者。<br/>
3. 对于前端程序员来说：模板引擎的语法相对来说是比较简单的，我们完全可以将页面的切割、继承和变量输出交给前端程序员。<br/>	
	这样就可以让最熟悉页面前端开发者来做这些东西，不易出错。<br/>
4. thinkPHP在访问一个不存在的控制器操作时，并不会直接返回错误，而会去找相应模板是否存在，如果存在就直接输出模板文件到浏览器。<br/>
	试想：很多时候前后端的开发并不是同步的，也没办法保持一致进度。这时前端程序员可以根据和PHP开发者沟通，确定好页面的controller和action<br/>
	然后前端开发者自己创建模板，完成模板分割、继承。当PHP程序员根据原型图开发完成功能后，assign相应数据，此时告诉前端开发者：<br/>
	'嗨，帅锅，数据给你了，你看看哦'。然后前端开发者在浏览器控制台输入：PARSE_VAR  时，就看到了一个json 对象，这就是页面中的数据<br/>
	然后前端程序员根据模板引擎的语法将相应变量放到页面中相应位置。一切不就ok了！当然，有时候也可能是PHP先完成了一个功能，这样也很美好，<br/>
	前端打开URL时，在控制台已经可以看到PHP分配给页面的数据了，然后前端快乐的输出变量到相应位置就好了！

<h1>有什么好处？</h1>
1. 一切都是开发接口<br/>
	对于前端和后端来说，一个页面的完成更加像一个接口的开发，PHP还是按照原来的开发，一切似乎没有什么不对，但是PHP通过assign的数据，<br/>
	对于前端来说就像一个接口一样，我拿到你的数据放到我的页面中。<br/>
2. 更加专业<br/>
	这样让PHP程序员专注于PHP业务逻辑，让熟悉页面的前端来搞定自己专业的页面问题<br/>
3. 效率更高  <br/>
	PHP程序员不会因为切割页面时，弄丢了页面的CSS和js而请教前端，因为大家做的都是自己很明白很专业的事情。可能前端程序员会在通过PARSE_VAR<br/>
	拿到PHP程序员assign的变量名时，对于一些变量名不理解，不知道是页面中哪里的数据，但是这个只是简单的沟通就能解决的事情（通常情况下assign过来的变量都是比较容易理解的）
</body>
<script type="text/javascript">
var data = Mock.mock({
    'list|1-10': [{
        'id|+1': 1
    }]
})
console.log(
    JSON.stringify(data, null, 4)
)

</script>
</html>