import React from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Route} from "react-router-dom";

import Bills from "./js/views/Bills";
import OnBoard from "./js/views/OnBoard";
import Login from './js/views/Login.js';
import SharedFridge from "./js/views/SharedFridge";
import Event from "./js/views/Event";
import Register from "./js/views/Register";
import ShoppingList from "./js/views/ShoppingList";
import Household from "./js/views/Household";
import SetProfile from "./js/views/SetProfile";
import Groups from "./js/views/Groups";

ReactDOM.render(
    <Router>
        <Route exact path="/">
                <OnBoard/>
        </Route>
        <Route exact path="/login">
                <Login/>
        </Route>
        <Route exact path="/register">
            <Register/>
        </Route>
        <Route path="/shared">
            <SharedFridge/>
        </Route>
        <Route path="/bills">
            <Bills/>
        </Route>
        <Route path="/event">
            <Event/>
        </Route>
        <Route path="/shopping">
            <ShoppingList/>
        </Route>
        <Route path="/household">
            <Household/>
        </Route>
        <Route path="/setProfile">
            <SetProfile/>
        </Route>
        <Route path="/groups">
            <Groups/>
        </Route>
    </Router>,
    document.querySelector('body')
);

