import React from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert2';

class Profile extends React.Component
{
    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);

        this.state = {
            user: {},
            message: ''
        };
    }

    handleChange(event) {
        var user = this.state.user;
        user[event.target.name] = event.target.value;
        this.setState(user);
    }

    componentWillMount() {
        var self = this;
        axios.get('/api/profile').then(function (data) {
            self.setState({
                user: data.data
            })
        }).catch(function (data) {
            console.log("ERROR", data)
        });
    }

    printRole() {
        if (typeof this.state.user.role !== 'undefined' && this.state.user.role !== null) {
            return <li className="m-r-20"><i className="fa fa-briefcase p-r-5 c-brown"></i> {this.state.user.role.display_name}</li>
        } else {
            return <li className="m-r-20"><i className="fa fa-briefcase p-r-5 c-brown"></i> Usuario sin privilegios</li>
        }
    }

    handleSubmit(event) {
        var self = this;
        axios.put('/api/profile', this.state.user).then(function(data) {
            swal.fire({
                type: 'success',
                text: 'Los datos han sido guardados'
            }).then(() => {
                location.reload();
            });
        }).catch(function (data) {
            swal.fire({
                type: 'error',
                text: 'Ha ocurrido un error al procesar tu solicitud, por favor vuelve a intentarlo'
            });
        });
        event.preventDefault();
        return false;
    }

    render() {
        return  (
        <div className="row profile">
            <div className="col-12">
                <form name="profileForm" onSubmit={this.handleSubmit} >
                    <div className="row">
                        <div className="col-12">
                            <ul className="list-unstyled profile-nav col-md-3">
                                <li>

                                </li>
                            </ul>
                            <div className="col-9">
                                <div className="row">
                                    <div className="profile-info">
                                        <h1>{this.state.user.name}</h1>
                                        <div className="m-t-10"></div>
                                        <ul className="list-unstyled list-inline">
                                            <li className="m-r-20"><i className="fa fa-calendar p-r-5 c-purple"></i> {this.state.user.created_at}</li>
                                            {this.printRole()}
                                        </ul>
                                        <div className="m-t-20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="row profile-classic">
                        <div className="col-md-12 m-t-20">
                            <div className="panel">


                                <div className="panel-body">
                                    <div className="row">
                                        <div className="col-12">
                                            <div className="form-group">
                                                <label>Nombre(s):</label>
                                                <input type="text" className="form-control" name="name" id="field-1" value={this.state.user.name} onChange={this.handleChange}/>
                                            </div>
                                            <div className="form-group">
                                                <label>Correo electrónico:</label>
                                                <input type="text" className="form-control" id="field-1" value={this.state.user.email}  disabled={true}/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-sm-12 text-right">
                            <button className="btn btn-primary m-r-20" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        )
    }
}

export default Profile;

if (document.getElementById('profile')) {
    ReactDOM.render(<Profile />, document.getElementById('profile'));
}