import logo2 from '../img/logo2.PNG';
import photo from '../img/pobrane (1).jpg'
import '../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faCheckCircle, faMoneyBillAlt, faPlus, faTimes, faTimesCircle} from '@fortawesome/free-solid-svg-icons'
import TopBar from "./TopBar";
import RightBar from "./RightBar";


function SubPage(pros){
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}
function Item(){
    return (
        <div className={"item"}>
            <span>item name</span>
            <FontAwesomeIcon icon={faCheckCircle}/>
            <FontAwesomeIcon icon={faTimesCircle}/>
        </div>
    )
}

function ItemsContainer(){
    return (
        <div className={"items-container-shopping"}>
            <Item/>
            <Item/>
            <Item/>

        </div>

    )
}

function FridgeContainer(){
    return (

        <div className={"household-container"}>
            <ItemAdd/>
            <ItemsContainer/>
        </div>
    )
}
function ItemAdd(){
    return (
        <div className={"photo-container"}>
            <img src={photo} alt=""/>
        </div>
    )
}



function OnBoard() {
    return (
        <div className={'background-white'}>
            <nav>
                <TopBar/>
                <SubPage title = {"Household"}/>
            </nav>
            <main>
                <FridgeContainer/>
                <FridgeContainer/>
                <FridgeContainer/>

            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
