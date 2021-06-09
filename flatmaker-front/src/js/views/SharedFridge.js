import '../../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faCheckCircle, faPlus} from '@fortawesome/free-solid-svg-icons'
import TopBar from "../components/TopBar";
import RightBar from "../components/RightBar";
import React, {useEffect, useState} from "react";
import {postHelp, userHelps} from "../api/Api";
import {useCookies} from "react-cookie";
import {removeHelp} from "../api/Api";

function SubPage(pros) {
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}




function OnBoard() {
    const [projects, setProjects] = useState();
    const [item, setItem] = useState("");
    const [state, setState] = useState(".normal-img");
    const [receiver, setReceiver] = useState();
    const [groupID] = useState(window.location.href.match(/\d+/g)[1]);
    const [cookies] = useCookies(['cookie-name']);
    const changeColor =()=>{
        console.log(state)
        if (state === ".normal-img")
            setState('.selected')
        else setState('.normal-img')
    }
    const removedHelp = async (id) => {
        console.log(id);
        const remHelp = await removeHelp({
            'id':id
        });
        await readProjects();
    }
    const readProjects = async () => {
        const getHelp = await userHelps(groupID);
        setProjects(getHelp);
        console.log(projects)
        console.log(item)
    }

    const addItem = async () => {
        const getHelp = await postHelp({
            toID: receiver,
            fromID: cookies['idUser'],
            groupID: groupID,
            name: item,
            isActive: true,
            value: 20,
            type: 1
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
                            projects['helps'].map((tech) => {
                                return (
                                <div id={tech['id']} className={"item"}>
                                    <span>{tech['name']}</span>
                                    <FontAwesomeIcon id={tech['id']} onClick={(e) => removedHelp(tech['id'])} icon={faCheckCircle}/>
                                    <img src={"/"+tech['id_from']['details']['photo']} alt={""}/>
                                    <img src={"/"+tech['id_to']['details']['photo']} alt={""}/>
                                </div>
                                )

                            })
                        }


                    </div>
                    <div className={"add-bill"}>
                        <input
                            type="text"
                            placeholder="type item"
                            onChange={(e) => setItem(e.target.value)}
                        ></input>
                        <FontAwesomeIcon  icon={faPlus} onClick={addItem}/>
                    </div>
                </div>
                <div className={"participants-container"}>
                    to:
                    {
                        projects !== undefined &&
                        projects['relation'].map((tech) => {
                            return <img  name={tech['id_user']['id']} className={state} onClick={(e) => setReceiver(e.target.name)} src={"/"+tech['id_user']['details']['photo']} alt=""/>
                        })}
                </div>
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
