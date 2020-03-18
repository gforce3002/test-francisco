import React, {Component} from 'react';

export default class Pagination extends Component {

    constructor(props) {
        super(props);
        this.state = {};
    }

    next() {
        this.props.setPage(this.props.page + 1);
    }

    prev() {
        this.props.setPage(this.props.page - 1);
    }

    render() {
        return <div {...this.props.domProps}>
            <nav aria-label="Page navigation example">
                <ul className="pagination">
                    {this.props.pages.length != 0 ? <li className={this.props.page == 1?"page-item disabled":"page-item"}>
                        <a className={this.props.loading?"page-link disabled":"page-link"} href="javascript:;" onClick={this.prev.bind(this)}>
                            Anterior
                        </a>
                    </li>:null}
                    {this.props.pages.map((item, key) => {
                        return <li key={key} className={item == this.props.page?"page-item active":"page-item"}>
                            <a className={this.props.loading?"page-link disabled":"page-link"} href="javascript:;" onClick={this.props.setPage.bind(this, item)}>
                                {item}
                            </a>
                        </li>
                    })}
                    {this.props.pages.length != 0 ? <li className={this.props.page == this.props.pages.length?"page-item disabled":"page-item"}>
                        <a className={this.props.loading?"page-link disabled":"page-link"} href="javascript:;" onClick={this.next.bind(this)}>
                            Siguiente
                        </a>
                    </li>:null}
                </ul>
            </nav>
        </div>
    }

}
