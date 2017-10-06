<form ng-controller="settingsController">
    <p>FName: <input ng-model="fname" type="text" value=""/></p>
    <p>LName: <input ng-model="lname" type="text" value=""/></p>
    <p>BD: <input ng-model="age" type="text" value=""/></p>
    <p>Study Year: <input ng-model="study_year" type="text" value=""/></p>
    <select id="country">
	<option value="">country</option>
    </select>
    <br/>
    <select id="lang">
	<option value="">Language</option>
    </select>
    <br/>
    <select id="univer-name">
	<option value="">University</option>
    </select>
    <br/>
    <select id="univer-class">
	<option value="">University Class</option>
    </select>
    <br/>
    <select id="study-city">
	<option value="">Study City</option>
    </select>
    <br/>
    <select id="study-lang">
	<option value="">Study Language</option>
    </select>
    <br/>
    <select id="gender">
	<option value="0">Male</option>
	<option value="1">Female</option>
    </select>
    <br/>
    <br/>
    <br/>
    <button>Save</button>
</form>
