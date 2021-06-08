import '../css/bills.css';
import TopBar from "./TopBar";
import RightBar from "./RightBar";
import React, {useEffect, useState} from "react";
import {getHelps} from "./Api";
import {useHistory} from "react-router";

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
            <img src={path + props.photo1} alt={""}/>
        </div>
    )
}

function OnBoard() {
    const history = useHistory();
    const [groups, setGroups] = useState([]);
    const readGroup = async () => {
        const group = await getHelps();
        setGroups(group);
        console.log(group);
    }
    const handleOnClick= async () => {
        history.push('/Shared/'+2);
    }
    useEffect(() => readGroup(), []);
    return (
        <div className={'background-white'}>
            <nav>
                <TopBar/>
                <SubPage title={"Shared Fridge"}/>
            </nav>
            <main>
                {groups.map((tech2) => {
                    return (
                        <div className={"fridge-container"}>
                            <h1>{tech2['name']}</h1>
                            <div className={"items-container"}>
                                {
                                    groups.length > 0 &&

                                    tech2['relation'].map((tech) => {
                                        return <Item name={tech['id_user']['details']['name']} photo1={tech['id_user']['details']['photo']}
                                        />
                                    })}


                            </div>
                            <div className={"add-bill"}>
                                <div className={"button-container"}>
                                    <button name={tech2['id'] } onClick={handleOnClick}>go in</button>
                                </div>
                            </div>
                        </div>)
                })}
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
