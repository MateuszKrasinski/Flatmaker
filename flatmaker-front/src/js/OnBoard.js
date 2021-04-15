import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import '../css/index.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome} from '@fortawesome/free-solid-svg-icons'



function Logo() {
    return <img className={"logo"} src={logo2} alt="logo"/>
}

function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars}/>
}

function HouseIcon() {
    return <FontAwesomeIcon icon={faHome}/>
}

const topBar = (
    <div className={"top-nav"}>
        <Logo/>
        <HamburgerIcon/>
    </div>
)

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
    return(
        <div className={"button-container"}>
            <button>Login</button>
            <button>Sign up</button>

        </div>
    )

}

function OnBoard() {
    return (
        <div>
            <nav>
                {topBar}
            </nav>
            <main>
                <OnBoardHeader/>
            </main>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
