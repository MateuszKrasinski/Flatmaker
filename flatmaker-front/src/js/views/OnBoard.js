import '../../css/onboard.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faHome} from '@fortawesome/free-solid-svg-icons'
import {useHistory} from "react-router";
import RightBar from "../components/RightBar";
import TopBar from "../components/TopBar";

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
