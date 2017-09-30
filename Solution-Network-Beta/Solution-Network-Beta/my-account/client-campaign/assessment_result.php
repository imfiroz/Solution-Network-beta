<?php

	include("/home/content/08/10141608/html/staging-url/online_business_client_database/sql.php");
 
	include("my-account/workflow-manager/notifications/not_pack.php");

 ?>
 <html>
<head>
	<title>
		Solutions Network Welcome page
	</title>
	<link rel="stylesheet" type="text/css" href="style_extra.css">
</head>

<body>

	<div class="header">
		<div class="header_inner">
			<div class="logo">
				<a href="<?php echo base_url(); ?>"><img src="images/extra/logo.png"></a>
			</div>
			
			<div class="upper_menu">
				<div class="login">
					<font class="login_font"><a href="<?php echo base_url(); ?>">Login</a></font>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_wrapper">				
        <div class="content_head">
            <div class="content_text">
<h1>Needs Assessment Results</h1>

<?php if($_GET['pcid'] != ''){


//save result assessment
		if($_POST['submit'] == 'submit')
			{
			
				$part_values = mysql_fetch_array(mysql_query("SELECT * FROM  `meet_and_greet` where pcamp_id=".$_GET['pcid']));
				
						
				if($part_values['user_id'] == '') {
					echo "false url";
				}
				else {
					mysql_query("UPDATE `prospects_results` SET  `status` =  '".$_POST['complementary_assessment']."' WHERE  user_id=".$part_values['user_id']." AND `id` =".$_POST['prospect_id']);
					
			
					header("location:".base_url()."my-account/client-campaign/campaign_contact.php");
					
			}
		}
//end: save result assessment		
		
	
	if($_GET['a_name'] == 'Accountant'){
		?>
        <form method="post" action="">
        	<table>
            	<tr>
                	<th colspan="2">Confidence in Current Professional Advice</th>
                </tr>
            	<tr>
                	<td>My current Accountant has a detailed understanding of my occupation & income structure. This is evident via regular & comperhensive Pro-Active assessments of my business & personal income & expenditure position, ensuring the maximum opportunity for tax effective strategies & results.</td>
                    <td>
                    	<select name="scores">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>My current Accountant has ensured my current legal & entity structure regarding trusts, companies etc. has been considered & implemented to ensure the most appropriate taxable treatment & protection of assets, income & expenses.</td>
                    <td>
                    	<select name="scores_one">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>My current Accountant has a vast and comprehensive accounting knowledge which has ensured my taxation position and strategy is complimentary to my long term Financial goals.</td>
                    <td>
                    	<select name="scores_two">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<th colspan="2">Satisfaction in Current Profesional Service</th>
                </tr>
            	<tr>
                	<td>My current accountant provides a Pro-Active service model ensuring a forward-planning strategy is followed regarding the preparing for estimate taxation costs or refunds.</td>
                    <td>
                    	<select name="scores_three">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>My current accountant provides both accurate and efficient responses when I require clarification on taxation enquiries or changes to my tax position.</td>
                    <td>
                    	<select name="scores_four">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>My current accountant's service model ensures I have clear understanding & receive a clear presentation of the strategies being applied and actions being made on my behalf between my accountant and the ATO.</td>
                    <td>
                    	<select name="scores_five">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<th colspan="2">Satisfaction in Current Pricing & Fees</th>
                </tr>
            	<tr>
                	<td>My currrent Accountant has a transparent pricing & fee structure which allows me to plan ahead for the costs of these services?</td>
                    <td>
                    	<select name="scores_six">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>I can create a logical & clear connection between my current accoutant's fee structure and A) the complexity of my taxation service needs B) the resources & time allocated and C) the results delivered.</td>
                    <td>
                    	<select name="scores_seven">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>
            	<tr>
                	<td>I have a clear understanding of where my current accountant's fees are ranked in the general market and am satisfied they are a fair and reasonable representation of the services provided and results achieved.</td>
                    <td>
                    	<select name="scores_eight">
                        	<option>1</option>
                        	<option>2</option>
                        	<option>3</option>
                        	<option>4</option>
                        	<option>5</option>
                        	<option>6</option>
                        	<option>7</option>
                        	<option>8</option>
                        	<option>9</option>
                        	<option>10</option>
                        </select>
                    </td>
                </tr>                
                <tr>
                	<td colspan="2">
                    <br /><br />
                    <input type="radio" name="complementary_assessment" value="1" />
                    YES, I'M INTERESTED IN A COMPLIMENTARY ASSESSMENT TO REVIEW MY POSITION AND THE BENEFITS AVAILABLE.	
                    <br /><br />
                    <input type="radio" name="complementary_assessment" value="2"/>
                    NO, I'M AWARE OF MY CURRENT POSITION AND THE BENEFITS OF A COMPLIMENTARY ASSESSMENT AND AM NOT INTERESTED.
                    </td>
                </tr>                
                <tr>
                	<td colspan="2">
                   <input type="submit" value="submit" name="submit"/>
                    </td>
                </tr>
            </table>
            </form>
        <?php
	}
	
	elseif($_GET['a_name'] == 'financial planner insurance'){
			?>
             <form method="post" action="">
                    <table>
                        <tr>
                            <th colspan="2">Confidence in Current Professional Advice</th>
                        </tr>
                        <tr>
                            <td>The current Insurance Professional's risk management program has considered your spouse or dependant's need to take time off or change their working hours if you passed away?</td>
                            <td>
                                <select name="scores">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>The current Insurance Professional's risk management program has confirmed your family can manage your debts and ongoing lifestyle expenses in the event you became disabled for the rest of your life?</td>
                            <td>
                                <select name="scores_one">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>The current Insurance Professional's risk management program has confirmed your desire to balance your ongoing career with caring for a permanently disabled spouse or dependant?</td>
                            <td>
                                <select name="scores_two">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Profesional Service</th>
                        </tr>
                        <tr>
                            <td>My current Insurance Professional performs regularl updates my risk management program to assess the initial and ongoing financial & lifestyle consequences of events including accidents, illness and death on the income, lifestyle expenditure, assets and debts position for me and my family.</td>
                            <td>
                                <select name="scores_three">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Insurance Professional has ensured my clear understanding on the financial & lifestyle risks I have chosen to protect and those remained unprotected, giving me clear anticipations on what to expect in claim scenarios.</td>
                            <td>
                                <select name="scores_four">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Insurance Profressional provides both accurate and efficient responses when I require clarification & amendments to my insurance protetction program.</td>
                            <td>
                                <select name="scores_five">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Pricing & Fees</th>
                        </tr>
                        <tr>
                            <td>My current Insurance Professional has provided me with a detailed market assessment of my insurance products pricing position in the market, including cover variences in cheaper and more expensive products available.</td>
                            <td>
                                <select name="scores_six">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I can create a logical & clear connection between my current insurance professional's A) fee structure, B) the complexity of my insurance service needs B) the resources & time allocated and C) the results delivered.</td>
                            <td>
                                <select name="scores_seven">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I have a clear understanding of where my current Insurance Professional's fees are ranked in the general market and am satisfied they are a fair and reasonable representation of the services provided and results achieved.</td>
                            <td>
                                <select name="scores_eight">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="1" />
                            YES, I'M INTERESTED IN A COMPLIMENTARY ASSESSMENT TO REVIEW MY POSITION AND THE BENEFITS AVAILABLE.	
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="2"/>
                            NO, I'M AWARE OF MY CURRENT POSITION AND THE BENEFITS OF A COMPLIMENTARY ASSESSMENT AND AM NOT INTERESTED.
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                           <input type="submit" value="submit" name="submit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php
	}
	
	elseif($_GET['a_name'] == 'financial planner wealth'){
				?>
             <form method="post" action="">
                    <table>
                        <tr>
                            <th colspan="2">Confidence in Current Professional Advice</th>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional's Investment strategy has included a detailed analysis of my lifestyle & financial goals both long & short term and has been presented as being relevent to my retirement time frames, debt reduction requirements & future lifestyle income & expense goals.</td>
                            <td>
                                <select name="scores">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional has provided short term milestone assessments  for my financial position in accordance with the long term goal requirements of my wealth strategy. Such milestones ensure I know the limits of short term performance of my investments will have a long term impact on my goals.</td>
                            <td>
                                <select name="scores_one">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I am aware of the statistical chances of my investments performing in accordance with the long term requirements of my financial & lifestyle goals being achieved.</td>
                            <td>
                                <select name="scores_two">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Profesional Service</th>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional has provided me with online access for easy access to my vital Wealth Strategy details and informations.</td>
                            <td>
                                <select name="scores_three">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth professional has a pro-active service plan with regular contact and scheduled review dates to ensure my Wealth Strategy remains both current & accurate.</td>
                            <td>
                                <select name="scores_four">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional provides both accurate and efficient responses when I require clarification & amendments to my insurance protetction program.</td>
                            <td>
                                <select name="scores_five">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Pricing & Fees</th>
                        </tr>
                        <tr>
                            <td>I can create a logical & clear connection between my current Wealth Professional's A) fee structure, B) the complexity of my strategy service needs B) the resources & time allocated and C) the results delivered.</td>
                            <td>
                                <select name="scores_six">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional's fee & income structure has been clearly explained incuding it's relevence to investment performance.</td>
                            <td>
                                <select name="scores_seven">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I have a clear understanding of where my current Wealth Professional's fees are ranked in the general market and am satisfied they are a fair and reasonable representation of the services provided and results achieved.</td>
                            <td>
                                <select name="scores_eight">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="1" />
                            YES, I'M INTERESTED IN A COMPLIMENTARY ASSESSMENT TO REVIEW MY POSITION AND THE BENEFITS AVAILABLE.	
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="2"/>
                            NO, I'M AWARE OF MY CURRENT POSITION AND THE BENEFITS OF A COMPLIMENTARY ASSESSMENT AND AM NOT INTERESTED.
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                           <input type="submit" value="submit" name="submit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
	}
	
	elseif($_GET['a_name'] == 'mortgage_broker'){
		?>
            <form method="post" action="">
                    <table>
                        <tr>
                            <th colspan="2">Confidence in Current Professional Advice</th>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional has provided short term milestone assessments  for my financial position in accordance with the long term goal requirements of my wealth strategy. Such milestones ensure I know the limits of short term performance of my investments will have a long term impact on my goals.</td>
                            <td>
                                <select name="scores">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional has provided short term milestone assessments  for my financial position in accordance with the long term goal requirements of my wealth strategy. Such milestones ensure I know the limits of short term performance of my investments will have a long term impact on my goals.</td>
                            <td>
                                <select name="scores_one">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I am aware of the statistical chances of my investments performing in accordance with the long term requirements of my financial & lifestyle goals being achieved.</td>
                            <td>
                                <select name="scores_two">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Profesional Service</th>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional has provided me with online access for easy access to my vital Wealth Strategy details and informations.</td>
                            <td>
                                <select name="scores_three">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth professional has a pro-active service plan with regular contact and scheduled review dates to ensure my Wealth Strategy remains both current & accurate.</td>
                            <td>
                                <select name="scores_four">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional provides both accurate and efficient responses when I require clarification & amendments to my insurance protetction program.</td>
                            <td>
                                <select name="scores_five">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Pricing & Fees</th>
                        </tr>
                        <tr>
                            <td>I can create a logical & clear connection between my current Wealth Professional's A) fee structure, B) the complexity of my strategy service needs B) the resources & time allocated and C) the results delivered.</td>
                            <td>
                                <select name="scores_six">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional's fee & income structure has been clearly explained incuding it's relevence to investment performance.</td>
                            <td>
                                <select name="scores_seven">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I have a clear understanding of where my current Wealth Professional's fees are ranked in the general market and am satisfied they are a fair and reasonable representation of the services provided and results achieved.</td>
                            <td>
                                <select name="scores_eight">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="1" />
                            YES, I'M INTERESTED IN A COMPLIMENTARY ASSESSMENT TO REVIEW MY POSITION AND THE BENEFITS AVAILABLE.	
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="2"/>
                            NO, I'M AWARE OF MY CURRENT POSITION AND THE BENEFITS OF A COMPLIMENTARY ASSESSMENT AND AM NOT INTERESTED.
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                           <input type="submit" value="submit" name="submit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
        <?php
	}
	else {
				?>
            <form method="post" action="">
                    <table>
                        <tr>
                            <th colspan="2">Confidence in Current Professional Advice</th>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional has provided short term milestone assessments  for my financial position in accordance with the long term goal requirements of my wealth strategy. Such milestones ensure I know the limits of short term performance of my investments will have a long term impact on my goals.</td>
                            <td>
                                <select name="scores">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>The current Wealth Professional has provided short term milestone assessments  for my financial position in accordance with the long term goal requirements of my wealth strategy. Such milestones ensure I know the limits of short term performance of my investments will have a long term impact on my goals.</td>
                            <td>
                                <select name="scores_one">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I am aware of the statistical chances of my investments performing in accordance with the long term requirements of my financial & lifestyle goals being achieved.</td>
                            <td>
                                <select name="scores_two">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Profesional Service</th>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional has provided me with online access for easy access to my vital Wealth Strategy details and informations.</td>
                            <td>
                                <select name="scores_three">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth professional has a pro-active service plan with regular contact and scheduled review dates to ensure my Wealth Strategy remains both current & accurate.</td>
                            <td>
                                <select name="scores_four">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional provides both accurate and efficient responses when I require clarification & amendments to my insurance protetction program.</td>
                            <td>
                                <select name="scores_five">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th colspan="2">Satisfaction in Current Pricing & Fees</th>
                        </tr>
                        <tr>
                            <td>I can create a logical & clear connection between my current Wealth Professional's A) fee structure, B) the complexity of my strategy service needs B) the resources & time allocated and C) the results delivered.</td>
                            <td>
                                <select name="scores_six">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>My current Wealth Professional's fee & income structure has been clearly explained incuding it's relevence to investment performance.</td>
                            <td>
                                <select name="scores_seven">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>I have a clear understanding of where my current Wealth Professional's fees are ranked in the general market and am satisfied they are a fair and reasonable representation of the services provided and results achieved.</td>
                            <td>
                                <select name="scores_eight">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="1" />
                            YES, I'M INTERESTED IN A COMPLIMENTARY ASSESSMENT TO REVIEW MY POSITION AND THE BENEFITS AVAILABLE.	
                            <br /><br />
                            <input type="radio" name="complementary_assessment" value="2"/>
                            NO, I'M AWARE OF MY CURRENT POSITION AND THE BENEFITS OF A COMPLIMENTARY ASSESSMENT AND AM NOT INTERESTED.
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2">
                           <input type="submit" value="submit" name="submit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
        <?php
	}
}
else {
	echo 'Link broken';
}
?>
</div>
        </div>
	</div>
			
	
	<div class="footer">
			
		<div class="footer_inner">	
			<div class="aside">
				<font class="footer_font"><a href="<?php echo base_url(); ?>">Home</a></font>  |  <font class="footer_font"><a href="<?php echo base_url(); ?>aboutus.php">About Us</a></font>  |  <font class="footer_font"><a href="#">Contact Us</a></font>  |  <font class="footer_font"><a href="#">Facilities</a></font>  |  <font class="footer_font"><a href="#">Services</a></font>  |  <font class="footer_font"><a href="#">Our Team</a></font><br>
				<font class="footer_copyright_font"><b>&copy; Copyright 2013 Solution Network.com, All right reserved.</b></font>
			</div>
			
			<div class="bside">
				<form action="#" method="POST">
					<input type="text" class="form_textbox"><br>
					<div class="footer_logos">
						<a href="#" rel="nofollow" target="Facebook"><img class="footer_logos_img" src="images/fb.png"></a>
						<a href="#" rel="nofollow" target="Google+"><img class="footer_logos_img" src="images/g+.png"></a>
						<a href="#" rel="nofollow" target="Twitter"><img class="footer_logos_img" src="images/twitter.png"></a>
						<a href="#" rel="nofollow" target="Skype"><img class="footer_logos_img" src="images/skype.png"></a>
					</div>
				</form>
				
				<font class="footer_developed">
					Design and Developed by <a href="#">Amkwebsolutions.com</a>
				</font>
			</div>
		</div>
	</div>
	
</body>
</html>