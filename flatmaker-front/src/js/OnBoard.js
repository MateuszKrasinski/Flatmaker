import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import '../css/index.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome} from '@fortawesome/free-solid-svg-icons'
import axios from "axios";
import {withRouter} from 'react-router-dom';
import { Link } from 'react-router-dom'
import {useHistory} from "react-router";
import RightBar from "./RightBar";
import topBar from "./TopBar";
import TopBar from "./TopBar";


function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars}/>
}

function HouseIcon() {
    return <FontAwesomeIcon icon={faHome}/>
}


function OnBoardHeader() {
    return (
        <div className={"onboard-header"}>
            <HouseIcon/>
            <h1>Do you have flatmate?</h1>
            <h1>Make life simpler</h1>
            <h2>Create your flat group</h2>
            <h2>and track what you want</h2>
            <Buttons/>
        </div>
    )
}

function Buttons() {
    const history = useHistory();
    return (
        <div className={"button-container"}>
            <button onClick={() => history.push('/login') }>Login</button>
            <button onClick={() => history.push('/register') }>Sign up</button>

        </div>
    )

}



function OnBoard() {
    let variable=[];

    {axios.get("https://127.0.0.1:8000/api/users.json").then((response)=>{console.log(response);variable=response.data})}

    return (
        <div className={"content-container"}>
            <div>
                <nav>
                    <TopBar/>
                </nav>
                <main>
                    <OnBoardHeader/>
                </main>
            </div>
                <RightBar/>
        </div>

    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
