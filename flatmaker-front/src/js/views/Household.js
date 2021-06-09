import photo from '../../img/person2.jpg'
import '../../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import { faCheckCircle, faTimesCircle} from '@fortawesome/free-solid-svg-icons'
import TopBar from "../components/TopBar";
import RightBar from "../components/RightBar";


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
