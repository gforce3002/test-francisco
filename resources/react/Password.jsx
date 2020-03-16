import React from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert2';

class Password extends React.Component {
    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);

        this.state = {
            user: {},
            password: {},
            message: ''
        };
    }

    handleChange(event) {
        var password = this.state.password;
        password[event.target.name] = event.target.value;
        this.setState({
            password: password
        });
    }

    handleSubmit(event) {
        var self = this;
        axios.put('/api/password', this.state.password).then(function (data) {
            swal.fire({
                type: 'success',
                text: 'Los datos han sido guardados'
            }).then(() => location.href = '/');
        }).catch(function (data) {
            swal.fire({
                type: 'error',
                text: 'La contraseña ingresada no es correcta, por favor, verifícala'
            });
        });
        event.preventDefault();
        return false;
    }

    componentWillMount() {
        var self = this;
        axios.get('/api/profile').then(function (data) {
            self.setState({
                user: data.data
            })
        });
    }

    equals() {
        if (this.state.password.newPassword !== this.state.password.confirmPassword) {
            return (<div className="row">
                <div className="col-md-12">
                    <div className="alert alert-danger">
                        La contraseña y la confirmación no coinciden
                    </div>
                </div>
            </div>);
        }
    }


    render() {
        return (
            <div className="row profile">
                <div className="col-12">
                    <div className="modal fade" tabIndex="-1" role="dialog" id="confirmationModal">
                        <div className="modal-dialog" role="document">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 className="modal-title">Mi Cuenta</h4>
                                </div>
                                <div className="modal-body">
                                    <p>{this.state.message}</p>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-default" data-dismiss="modal">Aceptar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form name="profileForm" onSubmit={this.handleSubmit} className="form-horizontal">
                        <div className="row">
                            <div className="col-12">
                                <div className="col-12">
                                    <div className="row">
                                        <div className="col-md-12 profile-info">
                                            <h1 className="text-center">{this.state.user.name}</h1>
                                            <div className="m-t-10"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row profile-classic">
                            <div className="col-12 m-t-20">
                                <div className="panel">
                                    <div className="panel-body">
                                        <div className="form-group">
                                            <div className="control-label c-gray col-md-3">Contraseña actual:</div>
                                            <div className="col-md-6">
                                                <input type="password" className="form-control" name="actual" id="field-1" value={this.state.password.actual} onChange={this.handleChange}/>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <div className="control-label c-gray col-md-3">Contraseña nueva:</div>
                                            <div className="col-md-6">
                                                <input type="password" className="form-control" id="field-1" value={this.state.password.newPassword}  onChange={this.handleChange} name="newPassword" />
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <div className="control-label c-gray col-md-3">Confirmación de contraseña:</div>
                                            <div className="col-md-6">
                                                <input type="password" className="form-control" id="field-1" value={this.state.password.confirmPassword} onChange={this.handleChange} name="confirmPassword"/>
                                            </div>
                                        </div>

                                        {this.equals()}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="clearfix"></div>
                        <div className="col-12 m-t-20">
                            <div className="text-right">
                                <button className="btn btn-primary m-r-20"
                                        disabled={!this.state.password.actual || !this.state.password.newPassword
                                        || !this.state.password.confirmPassword
                                        || (this.state.password.newPassword !== this.state.password.confirmPassword)}
                                        type="submit">Actualizar Contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>);
    }
}

export default Password;

if (document.getElementById('password')) {
    ReactDOM.render(<Password/>, document.getElementById('password'));
}
