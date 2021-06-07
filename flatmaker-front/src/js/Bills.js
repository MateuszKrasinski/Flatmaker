import photo from '../img/person1.jpg'
import '../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faArrowRight, faPlus} from '@fortawesome/free-solid-svg-icons'
import RightBar from "./RightBar";
import TopBar from "./TopBar";





function Bill(pros){
    return (
        <div className={"bill"}>
            <p> {pros.user}</p>
            <p>{pros.count}</p>
        </div>
    )
}

let arr = {user: "Jan", count: "12$"}
function BillsStory(pros){
    return (
        <div className={"bills-story"}>
                <Bill user = {arr.user} count ={arr.count}/>
        </div>
    )
}
function BillAdd(){
    return (
        <div className={"add-bill"}>
            <input placeholder={"type bill..."} type="text"/>
            <FontAwesomeIcon icon={faPlus}/>
        </div>
    )
}

function UserProfile(pros){
    return(
        <div className={"user-profile"}>
            <img src={photo} alt=""/>
            <h1> spent:    {pros.count}$</h1>
        </div>
    )

}

function BillContainer(){
    return (
        <div className={"bills-container"}>
            <BillsStory/>
            <BillAdd/>
        </div>
    )
}

function SettleButton(){
    return (
        <button className={"settle-button"}> Settle</button>
    )
}
function SummaryBills(){
    return(
        <div className={"summary-bills"}>
            <div className={'money-to-pay'}>
                <FontAwesomeIcon icon={faArrowRight}/>
                <span>30$</span>
            </div>
        </div>
    )
}
function SubPage(pros){
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}
function OnBoard() {
    return (
        <div className={'background-white'}>
            <nav>
                <TopBar/>
                <SubPage title = {"BILLS"}/>
            </nav>
            <main>
                <UserProfile count={12}/>
                <div className={"middle-container"}>
                    <BillContainer/>
                    <SummaryBills/>
                    <SettleButton/>
                </div>
                <UserProfile count={25}/>
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
