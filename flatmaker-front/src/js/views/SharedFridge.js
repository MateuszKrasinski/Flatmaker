import '../../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faCheckCircle, faPlus} from '@fortawesome/free-solid-svg-icons'
import TopBar from "../components/TopBar";
import RightBar from "../components/RightBar";
import React, {useEffect, useState} from "react";
import {postHelp,userHelps} from "../api/Api";
function SubPage(pros) {
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}


function Item(props) {
    const path = "/";
    return (
        <div className={"item"}>
            <span>{props.name}</span>
            <FontAwesomeIcon icon={faCheckCircle}/>
            <img src={path+props.photo1} alt={""}/>
            <img src={path+props.photo2} alt={""}/>
        </div>
    )
}

function OnBoard() {
    const [projects, setProjects] = useState();
    const [item, setItem] = useState("");

    const readProjects = async () => {
        const getHelp = await userHelps();
        setProjects(getHelp);
        console.log(projects)
        console.log(item)
    }

    const addItem = async ()=>{
        const getHelp = await postHelp({
            toID: 58,
            fromID: 57,
            groupID: 1,
            name: "jabłko",
            isActive: true,
            value:15,
            type:1
        },);
        console.log(getHelp);


    }

    useEffect(() => readProjects());
    return (
        <div className={'background-white'}>
            <nav>
                <TopBar/>
                <SubPage title={"Shared Fridge-"}/>
            </nav>
            <main>
                <div className={"fridge-container"}>
                    <div className={"items-container"}>
                        {
                            projects !== undefined &&
                            projects['helps'].map((tech)=>{
                                return <Item name={tech['name']} photo1={tech['id_from']['details']['photo']} photo2={tech['id_to']['details']['photo']} />
                            })
                        }


                    </div>
                    <div className={"add-bill"}>
                        <input
                            type="text"
                            placeholder="type item"
                            onChange={(e) => setItem(e.target.value)}
                        ></input>
                        <FontAwesomeIcon icon={faPlus} onClick={addItem}/>
                    </div>
                </div>
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
