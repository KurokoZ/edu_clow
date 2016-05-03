<?php
/*************************************************
 File name:      // AwardController
Author:  丰超     Version: 1.0     Date: 2015-12-15 // 作者、版本及完成日期
Description:    // 前台欧姆龙
*************************************************/
namespace Home\Controller;
class OmronController extends OmronCommonController {
	
	//首页 经过处理获得code
	public function index(){
		$url = urlencode("http://www.clow.net.cn/admin/Home/omron/vote");
		$urls = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$_SESSION['corpid']}&redirect_uri={$url}&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
		$this->assign("url",$urls);
		$this->display();
	}
	
	//投票
    public function vote(){
    	$code = $_GET['code'];
    	$data = $this->code($code);
    	if($data['UserID'] !== ''){
    		$datas['deviceid'] = $data['DeviceId'];
    		$datas['userid'] = $data['UserId'];
    		$_SESSION['UserId'] = $data['UserId'];
    		$_SESSION['DeviceId'] = $data['DeviceId'];
    		$poll = M("Omronvote_poll")->where("`userid`='{$data['UserId']}' and `deviceid`='{$data['DeviceId']}'")->field("id")->find();//查询信息是否真实
    		if($poll['id'] > 0){
    			
    		}else{
    			M("Omronvote_poll")->add($datas);//记录投票的人
    		}
    		$this->lists();
    		$this->display();
    	}else{
    		$url = U("Omron/index");
    		$this->redirect($url);
    	}
    }
    
    //投票方法
    public function poll(){
    	$id = I("post.key");
    	$poll = M("Omronvote_poll")->where("`userid`='{$_SESSION['UserId']}' and `deviceid`='{$_SESSION['DeviceId']}'")->field("id")->find();//查询信息是否真实
    	if($poll['id'] > 0){
    		$msg['key'] = $id;
    		$user = M("Omronvote_vote")->where("`openid`='{$_SESSION['UserId']}' and `deviceid`='{$_SESSION['DeviceId']}' and `fid`={$id}")->field("id")->find();
    		if($user['id'] > 0){
    			$msg['type'] = "false";
    			$msg['info'] = "您已给Ta点过赞";
    		}else{
    			$data['fid'] = $id;
    			$data['addtime'] = time();
    			$data['deviceid'] = $_SESSION['DeviceId'];
    			$data['openid'] = $_SESSION['UserId'];
    			$add = M("Omronvote_vote")->add($data);
    			if($add > 0){
    				$msg['type'] = "true";
    				$msg['info'] = "点赞成功";
    			}else{
    				$msg['type'] = "false";
    				$msg['info'] = "点赞失败";
    			}
    		}
    	}else{
    		$msg['type'] = "error";
    		$msg['url'] = U("Omron/index");
    	}
    	$this->ajaxReturn($msg);
    }
    

    //数据列表
    public function lists(){
    	//获取当前用户已经投票的对象
    	//获取所有参赛选手的票数
    	for($i=0;$i<41;$i++){
    		$ks[$i] = $i + 1;
    		$status[$i] = M("Omronvote_vote")->where("`openid`='{$_SESSION['UserId']}' and `deviceid`='{$_SESSION['DeviceId']}' and `fid`={$ks[$i]}")->field("id")->find();
    		if($status[$i]['id'] > 0){
    			$list[$i]['status'] = 'true';
    		}else{
    			$list[$i]['status'] = 'false';
    		}
    		$list[$i]['key'] = $ks[$i];
    		$list[$i]['num'] = M("Omronvote_vote")->where("`fid`={$ks[$i]}")->count();
    	}
    	//数组一
    	$list[0]['img'] = "/admin/Public/img/omronvote/1.jpg";
    	$list[0]['name'] = "商洪博";
    	$list[0]['department'] = "品牌战略部";
    	$list[0]['title'] = "OEM自动车部会";
    	$list[0]['content'] = "OMCC联合IAB、OAG、OCB-GC、环境事业推进室成立了OEM自动车部会，希望提升品牌形象，拉动销售。这是第一次多部门协同的合作，我们会通过定期的内部沟通和外部支持，群策群力解决难题！";
    	$list[1]['img'] = "/admin/Public/img/omronvote/2.jpg";
    	$list[1]['name'] = "崔新阳";
    	$list[1]['department'] = "上海集中采购部";
    	$list[1]['title'] = "中国间接材集中采购分科会的设立、展开及运营";
    	$list[1]['content'] = "加强沟通会帮助我们更加有效地解决企业内部问题，我们充分利用GMI横向机能，召集各WP间接材采购负责人及相关采购担当，定期就间接材相关课题召开采购分科会。";
    	$list[2]['img'] = "/admin/Public/img/omronvote/3.jpg";
    	$list[2]['name'] = "金卓雯";
    	$list[2]['department'] = "财务战略室财务规划部";
    	$list[2]['title'] = "改善并统一中国地区财务流程";
    	$list[2]['content'] = "针对OMCC各WP财务流程的自动化程度、IT系统参差不齐的现状，我们协力搭建理财系统平台，整合并统一管理各WP的财务流程，强化整个地区的内部控制。在短时间内，协调多方需求，拟定整个项目开展的日程安排，设计符合普遍使用要求的系统。";
    	$list[3]['img'] = "/admin/Public/img/omronvote/4.jpg";
    	$list[3]['name'] = "方文超";
    	$list[3]['department'] = "GMI-C生产过程革新中心";
    	$list[3]['title'] = "推进中华圈生产WP SCM改善，提高现金流";
    	$list[3]['content'] = "中华圈各WP都希望现金流向上，资产有效活用，特别是工厂库存量和抑制次品的产生尤其重要，我们希望通过推进中华圈生产WP SCM改善，切实减少工厂库存量，构筑安心简易的工作环境。";
    	$list[4]['img'] = "/admin/Public/img/omronvote/5.jpg";
    	$list[4]['name'] = "唐春玉";
    	$list[4]['department'] = "IT革新中心运维服务部";
    	$list[4]['title'] = "OMS PRIMEII SMD线外配料机能导入";
    	$list[4]['content'] = "在中国制造2025提出之际，我们认为作为IAB在中国生产基地的OMS，制造变革势在必行。我们的目标是——通过改善设备和数据维护作业工时，达成生产现场的改进与强化工厂的业务流程变革！";
    	$list[5]['img'] = "/admin/Public/img/omronvote/6.jpg";
    	$list[5]['name'] = "陆金花&李洁";
    	$list[5]['department'] = "GMI-C生产过程革新中心&CSR企文";
    	$list[5]['title'] = "2015年最佳实践大会经验分享Workshop";
    	$list[5]['content'] = "在FY14年首届最佳实践大会成功开展后，我们再接再厉，与WP深入交流合作，整合在各地的知识、经验、技术并进行统一管理，建立实践交流数据库，再次打造实践交流平台2.0";

    	//数组二
    	$list[6]['img'] = "/admin/Public/img/omronvote/7.jpg";
    	$list[6]['name'] = "黄安琪";
    	$list[6]['department'] = "香港管理部";
    	$list[6]['title'] = "企业理念浸透/活动 ";
    	$list[6]['content'] = "为了让每位员工深入理解欧姆龙企业理念，将欧姆龙价值观反应在日常的工作生活中，我们开展了欧姆龙关怀小区嘉许计划，鼓励同事将企业理念付诸于实践，并根据员工每年嘉许时段内参与义工服务累积的服务时数，在忘年会颁发嘉许状给予杰出义工，以表支持及鼓励。";
    	$list[7]['img'] = "/admin/Public/img/omronvote/8.jpg";
    	$list[7]['name'] = "袁翠萍";
    	$list[7]['department'] = "OSS ";
    	$list[7]['title'] = "无锡品质改善　MCBF10,000 ";
    	$list[7]['content'] = "2014年无锡地铁1、2号线开通之初，由于发卡回收模块故障频发给多方造成了不良影响。技术人员不断分析原因，在生产、营业等全体组员积极配合下，我们改善发卡回收模块品质，争取MCBF达到10,000并保持稳定，提高欧姆龙产品品质与形象。";
    	$list[8]['img'] = "/admin/Public/img/omronvote/9.jpg";
    	$list[8]['name'] = "李莎";
    	$list[8]['department'] = "OSS ";
    	$list[8]['title'] = "完成TRE-X500台交货";
    	$list[8]['content'] = "2015年，OSS团队接到了500台TRE-X模块（高铁磁票处理单元）的生产任务，面临厂家生产负荷大、交货期紧急、沟通工作复杂等诸多挑战。在种种困难和压力下，我们通过各方的紧密配合及高效的多方沟通，成功攻克这个时间紧、难度大、数量多的量产任务。";
    	$list[9]['img'] = "/admin/Public/img/omronvote/10.jpg";
    	$list[9]['name'] = "刘阳";
    	$list[9]['department'] = "GMI-C环境革新部";
    	$list[9]['title'] = "i-stop自动化节能系统的导入";
    	$list[9]['content'] = "目前针对WP的节能工作主要是一些设施类节能，我们尝试探讨和推进生产线的节能。通过成功导入i-stop自动化节能设备，实现SMT和DIP生产线的自动化节能，让设备在待机和停机的过程中，降低用能。节能与生产两不误，我们可以做到！";
    	$list[10]['img'] = "/admin/Public/img/omronvote/11.jpg";
    	$list[10]['name'] = "许丽蓉";
    	$list[10]['department'] = "GMI-C环境革新部 ";
    	$list[10]['title'] = "环境合规性，降低违法风险";
    	$list[10]['content'] = "随着史上最严的新环保法出台，执法力度和违法成本也随之增加，大大提高了企业合规风险管理的重要性。我们决定开展一系列的活动，在规定时间内完成对WP的风险诊断，对症下药，努力将重大风险降至“零”。";
    	$list[11]['img'] = "/admin/Public/img/omronvote/12.jpg";
    	$list[11]['name'] = "刘晨晨";
    	$list[11]['department'] = "知识产权部";
    	$list[11]['title'] = "打击网络侵权行为，净化网络销售环境 ";
    	$list[11]['content'] = "当前网络知识产权侵权现象日渐增多，对欧姆龙的品牌管理造成严重影响，也干扰了我们正常的经营活动。我们发挥知财团队的专业特长，强化防范网络侵权的对策，有效降低网络傍名牌及假冒行为对欧姆龙品牌形象造成的不良影响。";

    	//数组三
    	$list[12]['img'] = "/admin/Public/img/omronvote/13.jpg";
    	$list[12]['name'] = "山本秀男";
    	$list[12]['department'] = "OSS ";
    	$list[12]['title'] = "上海、北京地铁实现BH现场检测";
    	$list[12]['content'] = "在上海和北京的地铁站实现了BH（欧姆龙的地铁自动售票机纸币模块机）的现场检测，为开拓中国新市场迈出坚实一步。我们需要克服在中国市场起步晚，缺乏一定实绩经验的挑战，努力克服困难，最终使BH占据中国同类产品市场份额的首位。";
    	$list[13]['img'] = "/admin/Public/img/omronvote/14.jpg";
    	$list[13]['name'] = "魏明华";
    	$list[13]['department'] = "OSS";
    	$list[13]['title'] = "OSS BH 南宁受注";
    	$list[13]['content'] = "欧姆龙BH（纸币模块）在中国国内没有使用业绩的情况下，我们将努力说服南宁业主在2号线18个站中受注200台BH，实现零的突破，打造中国国内第一条采用OSS BH的地铁线路，推进欧姆龙纸币模块在中国的业务扩展。";
    	$list[14]['img'] = "/admin/Public/img/omronvote/15.jpg";
    	$list[14]['name'] = "费国强";
    	$list[14]['department'] = "IT革新中心应用方案部";
    	$list[14]['title'] = "OPT采购销售自动化项目支持";
    	$list[14]['content'] = "在OPT与美国W公司的业务合作中，由于W公司业务量庞大，原有手工操作的管理销售方式将会大大增加采购业务过程的错误率及资源消耗率。为此IT部门需要帮助OPT实现采购销售环节的自动化管理，在合理时间内完成与W公司的系统整合，达到自动化、无纸化、效率化的管理目标。";
    	$list[15]['img'] = "/admin/Public/img/omronvote/16.jpg";
    	$list[15]['name'] = "崔相哲";
    	$list[15]['department'] = "GMI-C采购调达过程革新中心";
    	$list[15]['title'] = "中国地区CSR调达体系的建立及推广";
    	$list[15]['content'] = "采购环节存在多种风险，我们希望在中国地区建立和推广CSR调达，对供应链上存在的CSR潜在风险进行管控，把握供应链情况，把欧姆龙的社会责任理念渗透到供应链管理，实现更好的采购经营活动，从而降低采购风险。";
    	$list[16]['img'] = "/admin/Public/img/omronvote/17.jpg";
    	$list[16]['name'] = "许文婕";
    	$list[16]['department'] = "GBI-C华东SCM部";
    	$list[16]['title'] = "创建中华圈共通的3PL业者评价标准";
    	$list[16]['content'] = "目前欧姆龙在中华圈使用的3PL业者多数由各WP自行审核采用，存在服务能力参差不齐、价格体系不同、路线据点重复浪费等不足，我们决心改变此现状。从制定3PL评价和进出标准入手，我们为WP制定统一的管理规则，为加强中华圈的统制功能打下基础。";
    	$list[17]['img'] = "/admin/Public/img/omronvote/18.jpg";
    	$list[17]['name'] = "徐超";
    	$list[17]['department'] = "IT革新中心应用方案部";
    	$list[17]['title'] = "信息可视化";
    	$list[17]['content'] = "在VG2020的指引下，欧姆龙完成业务需要更多技术支持，因此OMCC-IT需要实现一个具有使用效率高等优点的企业BI分析系统。我们通过搭建BI平台，提高整体报表制作以及分析能力，令客户用简单方法去查询数据并生成报告，帮助管理者提高决策水平和质量。";

    	//数组四
    	$list[18]['img'] = "/admin/Public/img/omronvote/19.jpg";
    	$list[18]['name'] = "徐幼圆";
    	$list[18]['department'] = "GBI-C华东SCM部";
    	$list[18]['title'] = "进出口风险管理体制构筑";
    	$list[18]['content'] = "我们致力于整合欧姆龙中华圈进出口物流资源，合理规避风险，构建健康良好的管理体制。今年是项目实施的第一年，各据点的信息都在逐步收集和确认。而各地海关操作手法的不同，给我们的工作带来挑战。我们将不畏困难，提高信息资源的敏感度，制定相应对策。";
    	$list[19]['img'] = "/admin/Public/img/omronvote/20.jpg";
    	$list[19]['name'] = "奚桔玲";
    	$list[19]['department'] = "财务战略室财务规划部";
    	$list[19]['title'] = "导入中国地区人民币跨境集中收付和轧差结算";
    	$list[19]['content'] = "我们此前成功构架了集中结算的结构，成为实现这一先进的资金管理方法的中国第一家企业。在此背景下，我们希望在中华圈10家WP交易人民币化及人民币集中结算的基础上，进一步实现人民币集中收付轧差结算，从而降低送金风险、减少事务负担、削减送金成本、提高资金效率。";
    	$list[20]['img'] = "/admin/Public/img/omronvote/21.jpg";
    	$list[20]['name'] = "商洪博";
    	$list[20]['department'] = "品牌战略部";
    	$list[20]['title'] = "OMCC与OEZ以Team OMRON共同出展IAS";
    	$list[20]['content'] = "我们将宏观市场经济动态结合IAB中国市场战略，与OEZ共同开发和策划2015工博会展出，并通过媒体和社交媒体的二次传播，向业界全面展示IAB“i-Automation!”的核心理念，以及欧姆龙品牌在工业自动化领域的技术实力。";
    	$list[21]['img'] = "/admin/Public/img/omronvote/22.jpg";
    	$list[21]['name'] = "金梁";
    	$list[21]['department'] = "GBI-C华南SCM部";
    	$list[21]['title'] = "华南区域运输整合及改善";
    	$list[21]['content'] = "受中国经济下行影响，很多WP销售业绩下滑，急需降低物流成本。我们希望通过整合华南各WP的运输资源，首次以公开竞标的方式实现资源整合并降低物流成本，同时对华南WP的物流实行第三方监管。";
    	$list[22]['img'] = "/admin/Public/img/omronvote/23.jpg";
    	$list[22]['name'] = "刘永进";
    	$list[22]['department'] = "GMI-C深圳品质技术部";
    	$list[22]['title'] = "从一本书到世界级的产品设计";
    	$list[22]['content'] = "我们团队完成了《部品つかいこなしリファレンスブック》2015年版（初版）这本书，旨在向开发部门提供欧姆龙器件的信息。但新的先端器件不断出现，我们需要进一步研究，为开发部门提供支持，从而将其更好地应用在产品设计上，进一步提高产品的附加值。";
    	$list[23]['img'] = "/admin/Public/img/omronvote/24.jpg";
    	$list[23]['name'] = "牛轩";
    	$list[23]['department'] = "环境事业中心";
    	$list[23]['title'] = "新KM电表中国市场新客户开拓及POT10亿日元达成";
    	$list[23]['content'] = "欧姆龙老款KM50/KM1电表的市场竞争力逐渐减弱，日本环境本部计划开发Global版新电表KMN3-S，决心提高中国非计费类电表市场的占有率。而国内的主流厂商基本都拥有内资背景，我们需要找到适合新KM电表的细分市场，并在行业壁垒中找到突破口，最终形成有效的POT客户订单。";

    	//数组五
    	$list[24]['img'] = "/admin/Public/img/omronvote/25.jpg";
    	$list[24]['name'] = "钟笔";
    	$list[24]['department'] = "GMI-C深圳品质技术部";
    	$list[24]['title'] = "加工品上流品质体系";
    	$list[24]['content'] = "2015年，我们将对供应商审查方法进行进一步完善，建立加工品品质上流体系，规范供应商的选定、审查、加工能力的评估，制定社内设计开发基准和规范，品质契约的签署，以及初期量产的监视等，争取在中华圈各WP得到有效利用并取得良好的实绩。";
    	$list[25]['img'] = "/admin/Public/img/omronvote/26.jpg";
    	$list[25]['name'] = "付凡";
    	$list[25]['department'] = "GMI-C深圳品质技术部";
    	$list[25]['title'] = "创新的限制化学物质管理体制的构筑";
    	$list[25]['content'] = "产品中的有害物质检测缺乏系统而有效的方法，我们不断思考如何通过分析测试与CMS监察等方法，最大限度防止产品出现有害物质超标事故。因此希望构建一套限制化学物质管理体制来降低生产风险，从小事做起推动欧姆龙全球发展，对社会做出更大贡献。";
    	$list[26]['img'] = "/admin/Public/img/omronvote/27.jpg";
    	$list[26]['name'] = "成志彬";
    	$list[26]['department'] = "GMI-C深圳集中采购部";
    	$list[26]['title'] = "东南亚供应商品质及成本水准调查";
    	$list[26]['content'] = "全球化趋势趋于明显，加强多据点生产变得很必要；同时中国环境发生变化，导致生产成本上升。为此，转移生产控制成本、在东南亚进行采购开拓活动变得很重要。我们将在年内把东南亚四国成本水准把握透，找出适合的供应商，为降低采购金额做出努力。";
    	$list[27]['img'] = "/admin/Public/img/omronvote/28.jpg";
    	$list[27]['name'] = "张端阳";
    	$list[27]['department'] = "行政管理部";
    	$list[27]['title'] = "ISO体系外审";
    	$list[27]['content'] = "今年适逢OCE-SH接受三年一度ISO14001环境管理体系外部审查，我们通过改进内部审核和落实改进计划来通过此审查。在前期的内部审核中我们发现了问题点，势必要在外审来临之际全部改善完毕，给外审老师呈现一个完善的ISO环境管理体系。";
    	$list[28]['img'] = "/admin/Public/img/omronvote/29.jpg";
    	$list[28]['name'] = "宁浩鹏";
    	$list[28]['department'] = "风险管理部";
    	$list[28]['title'] = "职业健康安全系统化管理";
    	$list[28]['content'] = "当前劳动安全卫生法要求严格，所有WP都应优先保障安全卫生状况，因此构筑劳动安全卫生管理系统很重要。我们要确认各WP安全卫生管理活动现状，完成职业健康安全管理系统的构建。在OMCC的协助之下，我们用设立模范WP等形式，推倒各WP之间的壁垒，让大家体会到“Team Omron”的意义。";
    	$list[29]['img'] = "/admin/Public/img/omronvote/30.jpg";
    	$list[29]['name'] = "仲艳";
    	$list[29]['department'] = "Monozukuri人财革新部";
    	$list[29]['title'] = "OPT-DG TPM人财育成";
    	$list[29]['content'] = "在中国随着自动化的加速推进，TPM（全员生产保全）活动变得越来越重要。因此，我们今年对OPT-DG的TPM进行支援活动，旨在培养OPT-DG的设备自主保全人才，从而促进TPM活动在OPT-DG的实施与展开，争取以制造现场最佳人员配比，实现设备效率的最大化。";

    	//数组六
    	$list[30]['img'] = "/admin/Public/img/omronvote/31.jpg";
    	$list[30]['name'] = "蔡海洋";
    	$list[30]['department'] = "GMI-C深圳集中采购部";
    	$list[30]['title'] = "购买专业能力强化";
    	$list[30]['content'] = "GMI采购部对同事的专业要求非常高，我们希望将购买市贩品主要业种的基础教育整理成资料，并在相关WP购买部门中展开培训交流，提高采购部整体专业能力。让采购小白，蜕变成采购能手。";
    	$list[31]['img'] = "/admin/Public/img/omronvote/32.jpg";
    	$list[31]['name'] = "贺平";
    	$list[31]['department'] = "Monozukuri人财革新部";
    	$list[31]['title'] = "传统课题崭新挑战—欧姆龙班体制革新";
    	$list[31]['content'] = "我们在现有欧姆龙班体制下进行革新，根据WP分布寻找合作学校，致力于为欧姆龙班带来更多优质生源。FY15之内至少开拓两所学校，与现行两所学校形成可以覆盖全WP的四校联合体制。通过与学校的合作，我们不仅能够培养学生，更希望为学校乃至中国的高职类教育改革作出贡献。";
    	$list[32]['img'] = "/admin/Public/img/omronvote/33.jpg";
    	$list[32]['name'] = "潘逸琼";
    	$list[32]['department'] = "GMI-C品质革新中心";
    	$list[32]['title'] = "欧姆龙中华圈品质人财战略基础构筑";
    	$list[32]['content'] = "从2012年开始，欧姆龙中国品质人财育成项目在中华圈及AP区域蓬勃开展，品质人财积累不断扩大，量增的同时，更应注重质的发展。我们利用现有品质人财数据资源信息，构筑欧姆龙中华圈（包括AP）品质人财战略基础——品质核心人财库，从而活用品质人财，发挥核心人财价值。";
    	$list[33]['img'] = "/admin/Public/img/omronvote/34.jpg";
    	$list[33]['name'] = "邓家飞";
    	$list[33]['department'] = "Monozukuri人财革新部";
    	$list[33]['title'] = "WP人财持续培养-构筑中华圈内部讲师体系";
    	$list[33]['content'] = "目前WP内部培训主要依靠外部第三方培训机构，但培训质量与效果无法保证，造成制造现场“有岗位却无合格人财”的人财梯队断层现象。为此，我们人财革新部希望通过建立内部讲师体系，巩固并壮大人财队伍。";
    	$list[34]['img'] = "/admin/Public/img/omronvote/35.jpg";
    	$list[34]['name'] = "区志雄";
    	$list[34]['department'] = "SCM HK";
    	$list[34]['title'] = "建立独立的香港WMS伺服系統";
    	$list[34]['content'] = "香港WMS伺服系统并入了中国内地的WMS伺服系统当中，但由于跨境网络不稳定，经常出现断线情况，严重影响仓库的日常运作。我们计划重新将该系统迁回本土，在OEA香港办公室建立独立的系统，并将香港WMS伺服系统每月9.5%的网络故障率降至1%。";
    	$list[35]['img'] = "/admin/Public/img/omronvote/36.jpg";
    	$list[35]['name'] = "林彦相";
    	$list[35]['department'] = "IT S&S HK";
    	$list[35]['title'] = "大中华区无线內联网推广应用";
    	$list[35]['content'] = "为防范公司无线局域网被侵入，我们采用双重安全验证的对策为企业提供方便、安全的局域网。对于经常出差的同事，我们为他们提供互通的域账户电脑身份，便于他们能方便又安全地连接不同地方的企业局域网。我们计划将这一对策在大中华区内进行推广应用，强化企业无线网络的安全措施。";

    	//数组七
    	$list[36]['img'] = "/admin/Public/img/omronvote/37.jpg";
    	$list[36]['name'] = "黄思慧";
    	$list[36]['department'] = "GMI-C生产过程革新中心";
    	$list[36]['title'] = "通过IE革新改善，实现生产性1.7倍的提升";
    	$list[36]['content'] = "欧姆龙各WP导入IE改善体系已很长时间，IE改善体系的进一步优化显得很有必要。GMI-C生产中心决定于今年对OMS等WP开展深化IE改善活动。我们通过说明活动的重要性，深化理解，赢得员工的认同，克服员工参与度不高、配合度不够、执行力度不足的困难，实现生产性1.7倍的提升！";
    	$list[37]['img'] = "/admin/Public/img/omronvote/38.jpg";
    	$list[37]['name'] = "朱正清";
    	$list[37]['department'] = "GMI-C生产过程革新中心";
    	$list[37]['title'] = "通过实施TPM活动，降低设备停止回数";
    	$list[37]['content'] = "我们明确TPM标准流程，从80%产线和设备要因分析出发，根据PDCA原则，每月对产线和设备的改善效果进行确认和跟踪。通过循环保养活动，恢复设备应有状态，通过改良保全活动，实现设备性能最大化。";
    	$list[38]['img'] = "/admin/Public/img/omronvote/39.jpg";
    	$list[38]['name'] = "王珍";
    	$list[38]['department'] = "GMI-C调达革新部";
    	$list[38]['title'] = "建立面向OMZ的VMI供应体制";
    	$list[38]['content'] = "我们通过建立面向OMZ的VMI供应体制，让每个部品按所需数量和时间到达目标WP，从而提高库存和物流效率。从开始遇到问题不知所措，到最终形成团队、共享情报、一同解决难题，我们坚持“对任何困难不轻易说不”的团队精神，真正体会到了TEAM OMRON的可贵之处。";
    	$list[39]['img'] = "/admin/Public/img/omronvote/40.jpg";
    	$list[39]['name'] = "张慧";
    	$list[39]['department'] = "GMI-C调达革新部";
    	$list[39]['title'] = "货物集中出港流程构筑";
    	$list[39]['content'] = "目前华南区供应商均自行安排出货，由于部分出货量少，供应商需特别安排港车，出现费用贵、交货LT长的问题。我们希望统一管理周边供应商，制定固定路线，自取货物，统一报关出口，在16年5月开始统一华南10家工厂出货，进一步提高 WP的信赖度、满意度。";
    	$list[40]['img'] = "/admin/Public/img/omronvote/41.jpg";
    	$list[40]['name'] = "顾荔荔";
    	$list[40]['department'] = "北京管理部";
    	$list[40]['title'] = "在纳期内完成北京事务所搬迁";
    	$list[40]['content'] = "北京事务所原办公地点的合同在8月底到期，公司决定利用该机会将办公室搬迁至更大的空间。为了避免租金的浪费，我们在短短3个月内完成了2015年度北京事务所的装修工程、家具采购、搬家、保洁、环境治理工程等工作。";

    	$this->assign('list',$list);
    }
}