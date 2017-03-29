<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/registration.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/yubinbango.js"></script>
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<body>

        <div id="wrapper">
           <header>
            <h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
           </header>
            <div id="breadcrumb">
                <p>TOP></p>
                <p>新規会員登録</p>
            </div>
            <form action="confirmation.php" method="post">
            <h2>新規会員登録</h2>
            <div id="contents">
                <div id="list">
                    <p>お客様情報の入力</p>
                    <p class="list">登録・確認</p>
                    <p class="list">登録完了</p>
                </div>
                <p id="caution">以下の項目を入力し「確認する」ボタンを押してください。必須は必須項目です。</p>
                <div id="item">
                    <table>
                        <tr>
                            <th>お名前&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><div class="sei">姓&emsp;<input type="text" name="sei" id="sei"
                                value="" class="w100" />&emsp;</div>
                                <div class="sei">名&emsp;<input
                                type="text" name="mei" id="mei" value=""
                                class="w100" />&emsp;</div>※全角
                            </td>
                        </tr>
                        <tr>
                            <th>フリガナ&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><div class="sei">
                                  セイ&nbsp;<input type="text" name="sei_kana" id="sei_kana" value="" class="w100" />
                                </div>
                                <div class="mei"> メイ&nbsp;&nbsp;<input type="text" name="mei_kana" id="mei_kana" value=""		class="w100" />&emsp;</div>※全角
                            </td>
                        </tr>
                        <tr>
                            <th>メールアドレス&nbsp;<span class="label require">必須</span>
                            </th>
                            <td class="registerPCmail no-border"><div class="mail"><input
                                type="text" name="mail" id="mail" value="" class="w250"
                                style="ime-mode: disabled;" />&emsp;※半角英数字</div>
                            </td>
                        </tr>
    
                        <tr>
                            <th>パスワード&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><input type="password" name="password" id="password" value=""
                                class="w250" style="ime-mode: disabled;" />&emsp;<span
                                class="note2">※8～20字の半角英数字のみ使用可能です。</span>
                            </td>
                        </tr>
    
                        <tr>
                            <th>パスワード(確認)&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><input type="password" name="password_confirm"
                                id="password_confirm" value="" class="w250"
                                style="ime-mode: disabled;" />&emsp;<span class="note2">※8～20字の半角英数字のみ使用可能です。</span>
                            </td>
                        </tr>
    
                        <tr>
                            <th>性別&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><label> <input type="radio" name="sex" id="sex"
                                    value="2" />&nbsp;女性
                            </label>&emsp; <label> <input type="radio" name="sex"
                                    id="sex" value="1" />&nbsp;男性
                            </label>&emsp;<span class="note2">※ご登録後は変更できません。</span>
                            </td>
                        </tr>
    
                        <tr>
                            <th>生年月日&nbsp;<span class="label require">必須</span>
                            </th>
                            <td class="birth"><select name="year" id="birthday_year"
                                class="input-small"><option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                            </select> 年 <select name="month" id="birthday_month"
                                class="input-small"><option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                            </select> 月 <select name="day" id="birthday_day"
                                class="input-small"><option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                            </select> 日 &emsp;<br />※ご登録後は変更できません。</td>
                        </tr>
                        <tr>
                            <th>住所&nbsp;<span class="label require">必須</span>
                            </th>
                            <td><input type="text" name="address" id="" value=""
                                class="w250" style="ime-mode: disabled;" /></td>
                    </table>
                </div>
            </div>
            <div id="button">
                <p><input type="reset" value="リセット" /></p>
                <p><input type="submit" value="登録"></p>
      		</div>
         </form>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
   
</body>
</html>