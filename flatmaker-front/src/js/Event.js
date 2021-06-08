import '../css/App.css';
import '../css/calendar.css';
import Calendar from 'react-calendar';
import {useState} from "react";
import TopBar from "./TopBar";
import RightBar from "./RightBar";


function SubPage(pros){
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}

function MyApp() {
    const [value, onChange] = useState(new Date());

    return (
        <div>
            <Calendar
                onChange={onChange}
                value={value}
            />
        </div>
    );
}
function OnBoard() {
    return (
        <div >
            <nav>
                <TopBar/>
                <SubPage title = {"BILLS"}/>
            </nav>
            <main>
                <MyApp/>
            </main>
            <RightBar/>
        </div>
    );
}



export default OnBoard;