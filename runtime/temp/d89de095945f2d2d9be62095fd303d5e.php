<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\AppServ\www\tv\public/../application/ad\view\applogs\report.html";i:1526464387;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据统计</title>
</head>
<style>
    table{
        text-align: center;
        float: left;
        margin-left: 30px;
    }
</style>
<body>
昨日访问用户数：<?php echo $sn_num; ?>  总访问用户数：<?php echo $total_sn; ?><br/>
昨日播放时长：<?php echo $duration['duration']; ?>  总播放时长：<?php echo $t_duration; ?><br/>
<br/>
<br/>
<table>
    <tr>
        <td colspan="4">昨日热播排行</td>
    </tr>
    <tr>
        <td>排名</td>
       <td>资源名称</td>
        <td>时长</td>
        <td>来源</td>
        <td>用户数</td>
    </tr>
    <?php if(is_array($hotlist) || $hotlist instanceof \think\Collection || $hotlist instanceof \think\Paginator): $k = 0; $__LIST__ = $hotlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
    <tr>
        <td><?php echo $k; ?></td>
        <td><?php echo $vo['resource']; ?></td>
        <td><?php echo $vo['duration']; ?></td>
        <td>cntv</td>
        <td><?php echo $vo['snn']; ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td colspan="4">总热热播排行</td>
    </tr>
    <tr>
        <td>排名</td>
        <td>资源名称</td>
        <td>时长</td>
        <td>来源</td>
        <td>用户数</td>
    </tr>
    <?php if(is_array($t_hotlist) || $t_hotlist instanceof \think\Collection || $t_hotlist instanceof \think\Paginator): $k = 0; $__LIST__ = $t_hotlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
    <tr>
        <td><?php echo $k; ?></td>
        <td><?php echo $vo['resource']; ?></td>
        <td><?php echo $vo['duration']; ?></td>
        <td>cntv</td>
        <td><?php echo $vo['snn']; ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td colspan="4">昨日活跃用户</td>
    </tr>
    <tr>
        <td>排名</td>
        <td>sn</td>
        <td>时长</td>
        <td>电影数</td>
    </tr>
    <?php if(is_array($userlist) || $userlist instanceof \think\Collection || $userlist instanceof \think\Paginator): $k = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
    <tr>
        <td><?php echo $k; ?></td>
        <td><?php echo $vo['sn']; ?></td>
        <td><?php echo $vo['duration']; ?></td>
        <td><?php echo $vo['resources']; ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td colspan="4">总活跃用户</td>
    </tr>
    <tr>
        <td>排名</td>
        <td>sn</td>
        <td>时长</td>
        <td>电影数</td>
    </tr>
    <?php if(is_array($t_userlist) || $t_userlist instanceof \think\Collection || $t_userlist instanceof \think\Paginator): $k = 0; $__LIST__ = $t_userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
        <tr>
            <td><?php echo $k; ?></td>
            <td><?php echo $vo['sn']; ?></td>
            <td><?php echo $vo['duration']; ?></td>
            <td><?php echo $vo['resources']; ?></td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>