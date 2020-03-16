import React, {Component} from 'react';

export default class AdminHeader extends Component {

    constructor(props) {
        super(props);
        this.state = {

        };
    }

    render() {
        /* <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol> */
        return <section className="content-header">
            <h1>
                {this.props.title}
                {this.props.subtitle?<small>{this.props.subtitle}</small>:''}
            </h1>
        </section>
    }
}